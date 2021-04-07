<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->vorname = 'Bert';
        $user->nachname = 'Hauser';
        $user->geschlecht = 'maennlich';
        $user->impfung_id = '121';
        $user->svnr = '992';
        $user->telefonNr = '0675';
        $user->rolle = 'teilnehmer';
        $user->impfung_verabreicht= false;
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
    }
}
