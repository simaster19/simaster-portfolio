<?php

namespace Database\Seeders\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skill = [
            "PHP",
            "JAVASCRIPT",
            "LARAVEL"
        ];

        $level = [
            "PRO",
            "INTERMEDIATE",
            "BEGINNER"
        ];

        $type = [
            "BAHASA",
            "LAINNYA",
            "FRAMEWORK"
        ];

        for ($i = 0; $i <= 2; $i++) {
            Skill::create([
                "nama_skill" => $skill[$i],
                "level" => $level[$i],
                "type" => $type[$i]
            ]);
        }
    }
}
