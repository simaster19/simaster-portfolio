<?php

namespace Database\Seeders\Seeder;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;


class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Testimonial::create([
            "id_project" => 1,
            "foto" => null,
            "nama_client" => "parman",
            "keterangan" => "jdjdjd"
        ]);
    }
}
