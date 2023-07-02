<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.remove trucation
     *
     * @return void
     */
    public function run()
    {
        $apartments = [Apartment::where('id', 145)->first(), Apartment::where('id', 146)->first(), Apartment::where('id', 147)->first()];
    
        foreach($apartments as $apartment){
            for($i = 0; $i < rand(200, 600); $i++){
                $newView = new View();
                
    
                $newView->apartment_id = $apartment->id;
    
                $newView->ip_address = fake()->ipv4();

                $newView->created_at = fake()->dateTimeBetween('2023-01-01', '2023-07-04');
    
                $newView->save();
            }
        }
    }
}
