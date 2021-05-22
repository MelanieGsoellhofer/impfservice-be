<?php

namespace Database\Seeders;


use App\Models\Location;
use App\Models\Vaccination;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB ;
//use Ramsey\Uuid\Type\Time;

class ImpfungTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $impfung1 = new Vaccination();
       $impfung1->vaccinationdate = "2021-06-10";
       $impfung1->starttime = "12:00";
       $impfung1->endtime = "13:00";
       $impfung1->maxparticipants = "20";
       $impfung1->location_id = 1;
       $impfung1->save();

        $impfung2 = new Vaccination();
        $impfung2->vaccinationdate = "2021-06-19";
        $impfung2->starttime = "10:00";
        $impfung2->endtime = "13:00";
        $impfung2->maxparticipants = "30";
        $impfung2->location_id = "2";
        $impfung2->save();


        $impfung3 = new Vaccination();
        $impfung3->vaccinationdate = "2021-08-19";
        $impfung3->starttime = "12:00";
        $impfung3->endtime = "16:00";
        $impfung3->maxparticipants = "10";
        $impfung3->location_id = "1";
        $impfung3->save();

    }
}
