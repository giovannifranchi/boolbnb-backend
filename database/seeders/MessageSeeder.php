<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        for($i = 0; $i < 50; $i++){
            $randomApartment = Apartment::inRandomOrder()->first();
            $newMessage = new Message();

            $newMessage->name = fake()->firstName();
            $newMessage->lastname = fake()->lastName();
            $newMessage->email = fake()->email();
            $newMessage->text = fake()->text();
            $newMessage->apartment_id = $randomApartment->id;

            $newMessage->save();
        }
    }
}
