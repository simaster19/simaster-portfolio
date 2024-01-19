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
    Schema::create('posts', function (Blueprint $table) {
      $table->bigIncrements("id_post");
      $table->unsignedBigInteger("id_user");
      $table->string("judul")->nullable(false);
      $table->string("slug", 100);
      $table->text("gambar")->nullable(true);
      $table->longText("content")->nullable(true);
      $table->timestamps();

      //Relasi
      $table->foreign("id_user")->references("id_user")->on("users");

    });
  }

  /**
  * Reverse the migrations.
  */
  public function down(): void
  {
    Schema::dropIfExists('posts');
  }
};