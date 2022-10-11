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
            
            foreach ($sponsorships as $sponsorship) {

                $apartment->sponsorships()->attach($sponsorship->id);

                $apartment->start_sponsor = $faker->dateTime();

                $apartment->end_sponsor = $faker->dateTime();
            }
        }

        // for ($i=0; $i < 1; $i++) { 

        //     $sponsorship = Sponsorship::inRandomOrder()->limit(1)->get();

        //     $date = $faker->dateTime()->start_sponsor;

        //     $apartments[$i]->attach($date);

        //     $apartments[$i]->sponsorships()->attach($sponsorship[$i]->id);
            
        // }
    }
}
