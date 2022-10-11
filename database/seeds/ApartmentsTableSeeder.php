<?php

use App\Models\Apartment;
use App\User;
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
                'image' => 'https://cf.bstatic.com/xdata/images/hotel/max500/162105631.jpg?k=8a20c08a1592ff9589716815636f14eef9f1f35a0a2dd1762ebe7b375307c727&o=&hp=1',
                'is_visible' => true,
                'long' => '40.76199237334906',
                'lat' => '14.031702205442677',
            ],
            [
                'user_id' => 2,
                'title' => 'Corallo Residence',
                'rooms' => 4,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 50,
                'address' => '284 Via Vittorio Emanuele 284, 80079 Procida, Italia',
                'image' => 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/299548786.jpg?k=bf33a424fd5407bbb4ba53d7b1be2f2456da4d3aab923a90ee61fdeaa5a7f1e7&o=&hp=1',
                'is_visible' => true,
                'long' => '40.7577703070356',
                'lat' => '14.019365200587943',
            ],
            [
                'user_id' => 3,
                'title' => 'IzzHome Bella Vista',
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 35,
                'address' => '2 Via Perugia, 97100 Marina di Ragusa, Italia',
                'image' => 'https://cf.bstatic.com/xdata/images/hotel/max500/162105631.jpg?k=8a20c08a1592ff9589716815636f14eef9f1f35a0a2dd1762ebe7b375307c727&o=&hp=1',
                'is_visible' => true,
                'long' => '36.781475462893944',
                'lat' => '14.530960987775696',
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
            $apartment->image = $apartments[$i]['image'];
            $apartment->is_visible = $apartments[$i]['is_visible'];
            $apartment->long = $apartments[$i]['long'];
            $apartment->lat = $apartments[$i]['lat'];
            $apartment->save();
        }
    }
}
