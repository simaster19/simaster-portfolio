<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements("id_project");
            $table->text("cover")->nullable(false);
            $table->string("jenis_project")->nullable(false); //web, app, desktop
            $table->string("judul")->nullable(false);
            $table->string("slug")->nullable(false);
            $table->text("project_url")->nullable(true)->default(null);
            $table->string("nama_client");
            $table->longText("keterangan")->nullable(true);
            $table->text("dibuat_dengan")->nullable(false); //PHP Laravel, Javascript, dll
            $table->string("status")->default("PERSONAL"); //PERSONAL,FREELANCE, COURSE,
            $table->year("tahun_project")->default(2023);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
