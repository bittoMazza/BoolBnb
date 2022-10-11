<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $sponsorships = [
                [
                    'level' => 1,
                    'name' => 'bronze',
                    'price' => 2.99,
                    'duration' => 24,
                ],
                [
                    'level' => 2,
                    'name' => 'silver',
                    'price' => 5.99,
                    'duration' => 72,
                ],
                [
                    'level' => 3,
                    'name' => 'gold',
                    'price' => 9.99,
                    'duration' => 144,
                ],
            ];
    
            for ($i=0; $i < count($sponsorships); $i++) { 
                $sponsorship = new Sponsorship();           
                $sponsorship->level = $sponsorships[$i]['level'];
                $sponsorship->name = $sponsorships[$i]['name'];
                $sponsorship->price = $sponsorships[$i]['price'];
                $sponsorship->duration = $sponsorships[$i]['duration'];
                $sponsorship->save();
            }
    }
}
