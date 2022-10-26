<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'user_id' => 1,
                'title' => 'Casa sul mare',
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 25,
                'address' => 'Via Salita Castello 13, 80079 Procida, Italia',
                'is_visible' => true,
                'lat' => '40.76199237334906',
                'long' => '14.031702205442677',
            ],
            [
                'user_id' => 2,
                'title' => 'Corallo Residence',
                'rooms' => 4,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 50,
                'address' => 'Via Vittorio Emanuele 284, 80079 Procida, Italia',
                'is_visible' => true,
                'lat' => '40.7577703070356',
                'long' => '14.019365200587943',
            ],
            [
                'user_id' => 2,
                'title' => 'IzzHome Bella Vista',
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 35,
                'address' => 'Via Perugia 67, 97100 Marina di Ragusa, Italia',
                'is_visible' => true,
                'lat' => '36.781475462893944',
                'long' => '14.530960987775696',
            ],
        ];

        for ($i=0; $i < count($apartments); $i++) { 
            $apartment = new Apartment();
            $apartment->user_id = $apartments[$i]['user_id'];
            $apartment->title = $apartments[$i]['title'];
            $apartment->rooms = $apartments[$i]['rooms'];
            $apartment->beds = $apartments[$i]['beds'];
            $apartment->bathrooms = $apartments[$i]['bathrooms'];
            $apartment->square_meters = $apartments[$i]['square_meters'];
            $apartment->address = $apartments[$i]['address'];
            $apartment->is_visible = $apartments[$i]['is_visible'];
            $apartment->long = $apartments[$i]['long'];
            $apartment->lat = $apartments[$i]['lat'];
            $apartment->save();
        }
    }
}
