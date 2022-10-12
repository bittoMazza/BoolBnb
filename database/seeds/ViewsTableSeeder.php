<?php

use App\Models\Apartment;
use App\Models\View;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $apartments = Apartment::all();

        for ($i = 0; $i < 10; $i++) {
            $view = new View();
            $view->apartment_id = $faker->randomElement($apartments)->id;
            $view->ip_address = mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
            $view->save();
        }
    }
}
