<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = config('plans');

        Plan::truncate();

        foreach($plans as $plan){
            $newPlan = new Plan();

            $newPlan->name = $plan['name'];
            $newPlan->duration = $plan['duration'];
            $newPlan->price = $plan['price'];

            $newPlan->save();
        }
    }
}
