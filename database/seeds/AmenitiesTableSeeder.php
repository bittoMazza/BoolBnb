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
            'Wifi',
            'Servizio in camera',
            'Cucina',
            'Smart tv',
            'camino',
            'postazine ricarica veicoli elettrici',
            'palestra',
            'Tv',
            'ferro da stiro',
            'riscaldamento',
        ];

        foreach ($amenities as $amenity) {
            $newAmenity = new Amenity();
            $newAmenity->name = $amenity;
            $newAmenity->save();
        }
    }
}
