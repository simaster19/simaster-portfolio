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
        Schema::create('cv', function (Blueprint $table) {
            $table->bigIncrements("id_cv");
            $table->unsignedBigInteger("id_user");
            $table->text("file_cv")->default(null)->nullable(true);
            $table->integer("status")->default(0);
            $table->timestamps();

            $table->foreign("id_user")->references("id_user")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv');
    }
};
