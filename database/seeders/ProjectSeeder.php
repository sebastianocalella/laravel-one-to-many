<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <250 ; $i++) { 
            $newProject = new Project();
            $newProject->author = $faker->name();
            $newProject->title = $faker->unique()->sentence(2);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->modification_date = $faker->dateTimeThisYear();
            $newProject->is_urgent = $faker->boolean();
            $newProject->description = $faker->text(1000);
            $newProject->image_path = $faker->unique()->imageUrl();
            $newProject->save();
        }
    }
}
