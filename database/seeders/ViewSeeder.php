<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 500; $i++){
            $newView = new View();
            $randomApartment = Apartment::inRandomOrder()->first();

            $newView->apartment_id = $randomApartment->id;

            $newView->ip_address = fake()->ipv4();

            $newView->save();
        }
    }
}
