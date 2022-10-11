<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $registeredUser = new User();
        $registeredUser->password = Hash::make('1234piero');
        $registeredUser->email = 'pierino@gmail.com';
        $registeredUser->name = 'Piero';
        $registeredUser->surname = 'Roccanza';
        $registeredUser->date_birth = '2000-11-28';
        $registeredUser->save();

        $registeredUserApartment = new User();
        $registeredUserApartment->password = Hash::make('1234rocco');
        $registeredUserApartment->email = 'Roccolino@gmail.com';
        $registeredUserApartment->name = 'Rocco';
        $registeredUserApartment->surname = 'Gigiano';
        $registeredUserApartment->date_birth = '2000-09-28';
        $registeredUserApartment->save();
    }
}
