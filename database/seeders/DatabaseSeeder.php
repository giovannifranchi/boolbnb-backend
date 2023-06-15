<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Message;
use App\Models\View;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PlanSeeder::class,
            ServiceSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            ViewSeeder::class,
        ]);
    }
}
