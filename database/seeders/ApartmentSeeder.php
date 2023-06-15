<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = config('apartments');

        foreach($apartments as $apartment){
            $randomUser = User::inRandomOrder()->first();

            $newApartment = new Apartment();

            $newApartment->user_id = $randomUser->id;
            $newApartment->address = $apartment['address'];
            $newApartment->city = $apartment['city'];
            $newApartment->state = $apartment['country'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->bathrooms = $apartment['bathrooms'];
            $newApartment->rooms = $apartment['rooms'];
            $newApartment->price = $apartment['price'];
            $newApartment->discount = $apartment['discount'];
            $newApartment->latitude = $apartment['latitude'];
            $newApartment->longitude = $apartment['longitude'];
            $newApartment->cover_image = $apartment['cover_image'];
            $newApartment->description = $apartment['description'];

            $newApartment->save();

            $plan = Plan::inRandomOrder()->first();


            $now = Carbon::now();

            $expiration = $now->addHours($plan->duration);

            $newApartment->plans()->attach($plan->id, ['expire_date'=>$expiration]);

        
        }
    }
}
