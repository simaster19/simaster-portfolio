<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
          "nama_category" => "Tech",
          "slug" => "tech",
          ]);
          
          Category::create([
          "nama_category" => "Tutorial",
          "slug" => "tutorial",
          ]);
    }
}
