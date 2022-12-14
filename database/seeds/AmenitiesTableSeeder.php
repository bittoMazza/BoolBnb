<?php

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            'Riscaldamento a pavimento',
            'Giardino',
            'Posto auto',
            'Vasca idromassaggio',
            'Wi-Fi',
            'Servizio in camera',
            'Cucina',
            'Smart tv',
            'Camino',
            'Postazione ricarica veicoli elettrici',
            'Palestra',
            'Tv',
            'Ferro da stiro',
            'Riscaldamento',
        ];

        foreach ($amenities as $amenity) {
            $newAmenity = new Amenity();
            $newAmenity->name = $amenity;
            $newAmenity->save();
        }
    }
}
