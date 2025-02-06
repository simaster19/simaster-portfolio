<?php

namespace Database\Seeders\Seeder;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;


class TestimonialSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    $project = Project::all(["id_project"]);

    Testimonial::create([
      "id_project" => $project[0]->id_project,
      "foto" => null,
      "nama_client" => "Si Parman",
      "keterangan" => "Lorem Lorem Lorem Lorem Lorem"
    ]);
  }
}