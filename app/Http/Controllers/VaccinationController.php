<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vaccination;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;


class VaccinationController extends Controller
{
    public function index(){
       $impfungen = Vaccination::with(['users', 'location'])->get();
       return $impfungen;
    }

    public function findByID(string $id){
        $impfung = Vaccination::where('id', $id)
            ->with(['users', 'location'])
            ->first();
        return $impfung;
    }

    public function save (Request $request) : JsonResponse {
        $request = $this->parseRequest($request);

        //var_dump("hello"); die();
        //var_dump($request); die();

        DB::beginTransaction();
        try {

          $location = Location::firstOrNew($request["location"]);
            $location->save();
           // var_dump($request["vaccinationdate"]);die();

            $vaccination = Vaccination::firstOrNew([
                'vaccinationdate' => $request["vaccinationdate"],
                'starttime' => $request["starttime"],
                'endtime' => $request["endtime"],
                'maxparticipants' => $request["maxparticipants"],
                'location_id' => $location->id
            ]);
            $vaccination->save();

            DB::commit();
            return response()->json($vaccination, 201);
        }

        catch (\Exception $e) {

            DB::rollBack();
            return response()->json("saving impfung failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * UPDATE einer IMPFUNG (PUT)
     * @param Request $request
     * @param string $id
     * @return JsonResponse|Request
     */
    public function update(Request $request, string $id)  :JsonResponse {

        //var_dump("hello"); die();
        //var_dump($request); die();
        //return $request;
        DB::beginTransaction();

        try {
            // richtige Impfung rausholen
             $impfung = Vaccination::where('id', $id)
            ->with(['users', 'location'])
            ->first();
            // var_dump($impfung); die();
            //return $request["location"];
            //return $request;

            // überschreiben
             $impfung->update([
               'vaccinationdate' => $request["vaccinationdate"],
                'starttime' => $request["starttime"],
                'endtime' => $request["endtime"],
                'maxparticipants' => $request["maxparticipants"],
                 'location_id' => $impfung->id
            ]);

            // save
            $impfung->save();
             //var_dump($request["vaccinationdate"]);die();

            // rausholen der gespeicherten Impfung
            $location = Location::where('id', $impfung->location_id)->first();
            $location->update([
                'title' => $request["location"]["title"],
                'zipcode' => $request["location"]["zipcode"],
                'adress' => $request["location"]["adress"],
                'description' => $request["location"]["description"]
            ]);

            //return $request["location"];
            $location->save();
            $impfung1 = Vaccination::where('id', $id)
                ->with(['users', 'location'])
                ->first();

            DB::commit();
            return response()->json($impfung1, 201);
        }

        catch (\Exception $e) {

            DB::rollBack();
            return response()->json("updating impfung failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * Delete Vaccination oder wirft Exception
     * (DELETE)
     */
    public function delete (string $id) : JsonResponse {
        $impfung = Vaccination::where('id' , $id)->first ();
        if($impfung != null){
            $impfung->delete ();
        }else
            throw new \Exception("impfung couldn't be deleted - it does not exist");
        return response()->json ('impfung (' . $id . ') successfully deleted' , 200);
    }

    /**
     * Hilfsmethode
     * modify / convert values if needed
     */
    private function parseRequest ( Request $request ) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime ( $request -> published );
        $request [ 'published' ] = $date;
        return $request;
    }
}
