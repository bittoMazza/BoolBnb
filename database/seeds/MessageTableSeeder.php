<?php

use App\Models\Apartment;
use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            $message->apartment_id = $faker->randomElement($apartments)->id;
            $message->name = $faker->firstName();
            $message->surname = $faker->lastName();
            $message->email = $faker->email();
            $message->content = $faker->text();

            $message->save();
        }
    }
}
