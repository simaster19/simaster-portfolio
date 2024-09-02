<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
  /**
  * Run the database seeds.
  */
  public function run(): void
  {
    User::create([
      "role" => 1,
      "foto" => "",
      "nama" => "Miftakhul Kirom",
      "tanggal_lahir" => date("Y-m-d", time()),
      "email" => "miftakhulkirom@gmail.com",
      "no_hp" => "89635032061",
      "alamat" => "Kp.Klaseman",
      "kode_pos" => 51372,
      "kota" => "kendal",
      "kecamatan" => "Kaliwungu",
      "desa" => "Kutoharjo",
      "rt" => "002",
      "rw" => "008",
      "username" => "admin",
      "password" => Hash::make("admin123")
    ]);

    User::create([
      "role" => 2,
      "foto" => "",
      "nama" => "Pengguna",
      "tanggal_lahir" => date("Y-m-d", time()),
      "email" => "pengguna@gmail.com",
      "no_hp" => "87676467877",
      "alamat" => "Kp.Klaseman",
      "kode_pos" => 51371,
      "kota" => "kendal",
      "kecamatan" => "Kaliwungu",
      "desa" => "Kutoharjo",
      "rt" => "002",
      "rw" => "008",
      "username" => "pengguna",
      "password" => Hash::make("pengguna123")
    ]);

  }
}