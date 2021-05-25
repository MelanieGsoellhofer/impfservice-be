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
        $user1 = new \App\Models\User;
        $user1->firstname = 'Melanie';
        $user1->lastname = 'Musterhuber';
        $user1->gender = 'weiblich';
        $user1->svnr = '65587455';
        $user1->phonenumber = '3659856';
        $user1->role = 'admin';
        $user1->isvaccinated= true;
        $user1->email = 'admin@test.com';
        $user1->password = bcrypt('secret');
        $user1->save();

        $user2 = new \App\Models\User;
        $user2->firstname = 'Gretl';
        $user2->lastname = 'Hauser';
        $user2->gender = 'weiblich';
        $user2->svnr = '6584236';
        $user2->phonenumber = '0647865226';
        $user2->role = 'impfwillig';
        $user2->isvaccinated= true;
        $user2->vaccination_id= 2;
        $user2->email = 'test@test.com';
        $user2->password = bcrypt('secret');
        $user2->save();

        $user3 = new \App\Models\User;
        $user3->firstname = 'Hans';
        $user3->lastname = 'Müller';
        $user3->gender = 'männlich';
        $user3->svnr = '321452112';
        $user3->phonenumber = '0699365112';
        $user3->role = 'impfwillig';
        $user3->isvaccinated= false;
        $user3->vaccination_id= 3;
        $user3->email = 'test123@test.com';
        $user3->password = bcrypt('secret');
        $user3->save();

        $user4 = new \App\Models\User;
        $user4->firstname = 'Patrick';
        $user4->lastname = 'Papst';
        $user4->gender = 'männlich';
        $user4->svnr = '365774877';
        $user4->phonenumber = '022587444';
        $user4->role = 'impfwillig';
        $user4->isvaccinated= true;
        $user4->vaccination_id= 2;
        $user4->email = 'test@gmail.com';
        $user4->password = bcrypt('secret');
        $user4->save();

        $user5 = new \App\Models\User;
        $user5->firstname = 'Anna Sophie';
        $user5->lastname = 'Musterhuber';
        $user5->gender = 'weiblich';
        $user5->svnr = '654325';
        $user5->phonenumber = '985612';
        $user5->role = 'admin';
        $user5->isvaccinated= true;
        $user5->email = 'admin1@test.com';
        $user5->password = bcrypt('secret');
        $user5->save();
    }
}
