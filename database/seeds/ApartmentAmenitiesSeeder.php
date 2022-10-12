<?php

use App\Models\Amenity;
use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentAmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {
            $randomAmenities = Amenity::inRandomOrder()->limit(3)->get();
            foreach ($randomAmenities as $amenity) {
                $apartment->amenities()->attach($amenity->id);
            }
        }
    }
}
