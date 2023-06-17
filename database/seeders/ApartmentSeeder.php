<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Plan;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        $images = config('images');

        

        foreach($apartments as $index => $apartment){
            $randomUser = User::inRandomOrder()->first();

            $newApartment = new Apartment();

            $newApartment->user_id = $randomUser->id;
            $newApartment->name = $apartment['description'];
            $newApartment->slug = Str::slug($newApartment->name);
            $newApartment->address = $apartment['address'];
            $newApartment->city = $apartment['city'];
            $newApartment->state = $apartment['country'];
            $newApartment->square_meters = $apartment['square_meters'];
            $newApartment->bathrooms = $apartment['bathrooms'];
            $newApartment->rooms = $apartment['rooms'];
            $newApartment->price = $apartment['price'];
            $newApartment->discount = $apartment['discount'];
            $newApartment->thumb = $images[rand(0, count($images)-1)]['path'];
            $newApartment->description = fake()->realText(500);

            $response = Http::get('https://api.tomtom.com/search/2/geocode/' . urlencode($apartment['address'] . ', ' . $apartment['city'] . ', ' . $apartment['country']) . '.json', [
                'key' => env('TOM_TOM_KEY')
            ]);

            $data = $response->json();

            if (!empty($data['results']) && isset($data['results'][0]['position'])) {
                $newApartment->latitude = $data['results'][0]['position']['lat'];
                $newApartment->longitude = $data['results'][0]['position']['lon'];
            }

            $newApartment->save();

            $services = Service::inRandomOrder()->take(rand(2, 10))->get();

            $idServices = [];

            foreach($services as $service){
                array_push($idServices, $service->id);
            }

            $newApartment->services()->attach($idServices);

            if($index % 3 === 0){
                $plan = Plan::inRandomOrder()->first();

                $now = Carbon::now();
    
                $expiration = $now->addHours($plan->duration);
    
                $newApartment->plans()->attach($plan->id, ['expire_date'=>$expiration]);
            }

        
        }
    }
}
