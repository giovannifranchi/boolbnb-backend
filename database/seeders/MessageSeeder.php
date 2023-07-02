<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [Apartment::where('id', 145)->first(), Apartment::where('id', 146)->first(), Apartment::where('id', 147)->first()];


        foreach($apartments as $apartment){
            for($i = 0; $i < rand(50, 200); $i++){
            
                $newMessage = new Message();
    
                $newMessage->name = fake()->firstName();
                $newMessage->lastname = fake()->lastName();
                $newMessage->email = fake()->email();
                $newMessage->text = Str::limit(fake()->text(40), 40);
                $newMessage->apartment_id = $apartment->id;
                $newMessage->created_at = fake()->dateTimeBetween('2023-01-01', '2023-07-04'); 
                
    
                $newMessage->save();
            }
        }
    }
}
