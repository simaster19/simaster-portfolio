<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubscribeMe;

class SubscribeMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscribeMe::create([
          "email" => "miftakhulkirom@gmail.com",
          "status" => 1
          ]);
    }
}
