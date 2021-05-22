<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Vaccination;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    /**
     * UPDATE einer IMPFUNG (PUT)
     * @param string $svnr
     * @param string $id
     * @return JsonResponse|Request
     */
    public function register(string $id, string $svnr)   {

        //var_dump("hello"); die();
        //var_dump($request); die();

        DB::beginTransaction();

        try {
            // User rausholen
            $user = User::where('svnr', $svnr)->first();

            // Vaccination_id überschreiben mit neuen Wert
            $user= $user->update([
                'vaccination_id' => $id
            ]);

            // save
            $user->save();
            DB::commit();

            $user1 = User::where('svnr', $svnr)
                ->first();

            return response()->json($user1, 201);
        }

        catch (\Exception $e) {

            DB::rollBack();
            return response()->json("updating impfung failed: " . $e->getMessage(), 420);
        }
    }
}
