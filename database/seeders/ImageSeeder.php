<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = config('apartments');

        foreach($apartments as $key=>$apartment){

            foreach($apartment['gallery'] as $image){

                $newImage = new Image();

                $newImage->apartment_id = $key + 1;

                $newImage->path = $image;

            }
        }
    }
}
