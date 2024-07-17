<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Seeder\UserSeeder;
use Database\Seeders\Seeder\CategorySeeder;
use Database\Seeders\Seeder\SkillSeeder;
use Database\Seeders\Seeder\ProjectSeeder;
use Database\Seeders\Seeder\PostSeeder;
use Database\Seeders\Seeder\MessageSeeder;
use Database\Seeders\Seeder\ImageSeeder;
use Database\Seeders\Seeder\TestimonialSeeder;
use Database\Seeders\Seeder\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  */
  public function run(): void
  {

    $this->call([
      UserSeeder::class,
      SkillSeeder::class,
      ProjectSeeder::class,
      PostSeeder::class,
      MessageSeeder::class,
      ImageSeeder::class,
      TestimonialSeeder::class,
      CategorySeeder::class,
      RolePermissionSeeder::class,
    ]);
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}