<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("role", 2)->get()->first();
        
        Message::create([
          "id_user" => $user->id_user,
          "nama" => $user->nama,
          "email" => $user->email,
          "message" => "Message untuk Email di teruskaan ke email"
          ]);
    }
}
