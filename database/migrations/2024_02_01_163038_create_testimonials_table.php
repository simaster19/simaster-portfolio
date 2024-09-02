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
    Schema::create('testimonials', function (Blueprint $table) {
      $table->bigIncrements("id_testimonial");
      $table->unsignedBigInteger("id_project")->default(0);
      $table->text("foto")->nullable(true)->default(null);
        $table->string("nama_client")->nullable(false);
        $table->text("keterangan")->nullable(false);
        $table->timestamps();
      });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
      Schema::dropIfExists('testimonials');
    }
  };