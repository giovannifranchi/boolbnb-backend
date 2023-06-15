<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            $newUser = new User();
            $newUser->name = fake()->name();
            $newUser->email = fake()->email();
            $newUser->password = fake()->password();

            $newUser->save();
        }
    }
}
