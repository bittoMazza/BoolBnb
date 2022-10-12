<?php

use App\Models\Apartment;
use App\Models\Sponsorship;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ApartmentsSponsorshipsSeeder extends Seeder
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

        foreach ($apartments as $apartment) {

            $sponsorships = Sponsorship::inRandomOrder()->limit(1)->get();
            
            for ($i=0; $i < count($sponsorships); $i++) {

                $apartment->sponsorships()->attach($sponsorships[$i]->id, ['start_sponsor' => $faker->dateTime() , 'end_sponsor' => $faker->dateTime()]);
            }
        }
    }
}
