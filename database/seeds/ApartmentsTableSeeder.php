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
            ],
            [
                'user_id' => 2,
                'title' => 'Appartmaneto vicino a Rimini',
                'rooms' => 8,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 70,
                'address' => 'Via Cristoforo Fontemaggi, 4, 47923 Rimini RN',
                'is_visible' => true,
                'lat' => '44.047578422255526',
                'long' => '12.554644359866689',
            ],
            [
                'user_id' => 2,
                'title' => 'Appartmaneto in villetta bifamiliare',
                'rooms' => 5,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 55,
                'address' => 'Via Andromeda, 28, 47923 Rimini',
                'is_visible' => true,
                'lat' => '44.049192712947914',
                'long' => '12.565005640509895',
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento a Roma',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 50,
                'address' => 'Largo dei Lombardi 23, 00187 Roma',
                'is_visible' => true,              
                'long' => 12.477944,
                'lat' => 41.9059015,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Milano',
                'rooms' => 5,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => 100,
                'address' => 'Galleria del Corso, 4 20122 Milano',
                'is_visible' => true,              
                'long' => 9.195207,
                'lat' => 45.464821,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Torino',
                'rooms' => 6,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 49,
                'address' => 'Via del Carmine 3, 10122 Torino',
                'is_visible' => true,
                'long' => 7.676150,
                'lat' => 45.075320,
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento a Palermo',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 1,
                'square_meters' => 27,
                'address' => 'Via Marchese di Villabianca 120, 90143 Palermo',
                'is_visible' => true,
                'long' => 13.348660,
                'lat' => 38.139350,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Bari',
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 3,
                'square_meters' => 53,
                'address' => 'Via G. Devitofrancesco 4/A, 70100 Bari',
                'is_visible' => true,
                'long' => 16.866410,
                'lat' => 41.115080,
            ],
            [
                'user_id' => 2,
                'title' => 'Appartamento a Bologna',
                'rooms' => 5,
                'beds' => 1,
                'bathrooms' => 3,
                'square_meters' => 65,
                'address' => 'Via dell industria 35, 40138 Bologna',
                'is_visible' => true,
                'long' => 11.404570,
                'lat' => 44.504700,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Milano',
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 66,
                'address' => 'Via Alessandro Manzoni 6, 20121 Milano',
                'is_visible' => true,
                'long' => 9.190630,
                'lat' => 45.467890,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Firenze',
                'rooms' => 3,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 63,
                'address' => 'Via della vigna nuova 5, 50123 Firenze',
                'is_visible' => true,
                'long' => 11.2503164,
                'lat' => 43.7712735,
            ],
            [
                'user_id' => 1,
                'title' => 'Appartamento a Napoli',
                'rooms' => 3,
                'beds' => 1,
                'bathrooms' => 4,
                'square_meters' => 254,
                'address' => 'Via Alessandro Scarlatti 3, 80127 Napoli',
                'is_visible' => true,
                'long' => 14.23482,
                'lat' => 40.844124,
            ],

            [
                'user_id' => 3,
                'title' => 'Casa Torre Orso',
                'rooms' => 5,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 220,
                'address' => "Via Litoranea 40, 73026 Torre dell'Orso, Melendugno, Puglia",
                'is_visible' => true,
                'lat' => '40.2699842900743',
                'long' => '18.432358449558574',
            ],
            [
                'user_id' => 3,
                'title' => 'Casa Bougainville',
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 150,
                'address' => "Via Corfu 23, 73026 Torre dell'Orso, Melendugno, Puglia",
                
                'is_visible' => true,
                'lat' => '40.27565062908004',
                'long' => '18.421230258396054',
            ],
            [
                'user_id' => 3,
                'title' => 'Casa Torre orso sulla spiaggia',
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 90,
                'address' => "Via Bellavista, 1, 73026 Torre dell'Orso, Melendugno, Puglia",
                'is_visible' => true,
                'lat' => '40.27593926723235',
                'long' => '18.430254836840213',
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
