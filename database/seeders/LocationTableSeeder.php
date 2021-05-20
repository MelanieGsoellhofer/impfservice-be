<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location1 = new Location();
        $location1 -> title = "Wien";
        $location1 -> zipcode = "6946";
        $location1 -> adress = "Praterweg";
        $location1 -> description = "Riesenrad";
        $location1 -> save();

        $location2 = new Location();
        $location2 -> title = "Linz";
        $location2 -> zipcode = "6954";
        $location2 -> adress = "Stadtplatz";
        $location2 -> description = "Landhaus";
        $location2-> save();

    }
}
