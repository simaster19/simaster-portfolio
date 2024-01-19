<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    $user = User::where("role", 1)->get()->first();

    Project::create([
      "cover" => "coba.png",
      "jenis_project" => "WEB",
      "project_url" => "-",
      "judul" => "Sistem ABC",
      "slug" => Str::slug("Sistem ABC"),
      "nama_client" => "Parman",
      "keterangan" => "Sistem inindibuat dengan xxx",
      "dibuat_dengan" => json_encode(["PHP", "LARAVEL", "JAVASCRIPT"]),

    ]);

  }
}