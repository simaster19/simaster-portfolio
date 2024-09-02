<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificate;

class CertificateSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    Certificate::create([
      "nama_online_course" => "Build With Angga",
      "gambar" => "gambar.jpg",
      "judul" => "Sistem XNXX",
      "slug" => "sistem-xnxx",
      "link_certificate" => "-"
    ]);


  }
}