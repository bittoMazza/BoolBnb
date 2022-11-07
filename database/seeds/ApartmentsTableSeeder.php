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
                'slug' => 'Casa-sul-mare-1',
                'isSponsored' => false,
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
                'slug' => 'Corallo-Residence-2',
                'isSponsored' => false,
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
                'slug' => 'IzzHome-Bella-Vista-3',
                'isSponsored' => false,
            ],
            [
                'user_id' => 1,
                'title' => 'Villetta al mare',
                'rooms' => 7,
                'beds' => 4,
                'bathrooms' => 3,
                'square_meters' => 120,
                'address' => 'Viale Giuseppe Mazzini 182, 47042 Cesenatico, Emilia Romagna',
                'is_visible' => true,
                'lat' => '44.21331410599949',
                'long' => '12.383846649136192',
                'slug' => 'Villetta-al-mare-4',
                'isSponsored' => false,
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento vicino a Rimini',
                'rooms' => 8,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 70,
                'address' => 'Via Cristoforo Fontemaggi, 4, 47923 Rimini RN',
                'is_visible' => true,
                'lat' => '44.047578422255526',
                'long' => '12.554644359866689',
                'slug' => 'Appartamanto-vicino-a-Rimini-5',
                'isSponsored' => false,
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
            $apartment->slug = $apartments[$i]['slug'];
            $apartment->save();
        }
    }
}
