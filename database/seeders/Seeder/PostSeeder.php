<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("role", 1)->get()->first();
        
        Post::create([
          "id_user" => $user->id_user,
          "id_category" => 1,
          "judul" => "Cara xxxx",
          "slug" => Str::slug("Cara xxx"),
          "gambar" => "coba.png",
          "content" => "Cara menggunakam djdjdj"
          ]);
    }
}
