<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Project;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::get()->first();
        
        Image::create([
           "id_project" => $project->id_project,
           "gambar" => json_encode(["gambar1.png","gambar2.png"])
          ]);
    }
}
