<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cv;

class CvSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    Cv::create([
      "id_user" => 1,
      "file_cv" => "coba.pdf",
      "status" => 1
      
    ]);
  }
}