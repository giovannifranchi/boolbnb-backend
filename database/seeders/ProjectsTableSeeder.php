<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for($i = 0; $i<10; $i++){
            $newProject = new Project();
            $newProject->title = $faker->words(4, true);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->summary = $faker->text();
            $newProject->save();
        }
    }
}
