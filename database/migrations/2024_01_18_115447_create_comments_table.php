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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements("id_comment");
            $table->unsignedBigInteger("id_post");
            $table->unsignedBigInteger("id_user");
            $table->longText("komentar");
            $table->timestamps();
            
            //Relasi 
            $table->foreign("id_post")->references("id_post")->on("posts");
            $table->foreign("id_user")->references("id_user")->on("users");
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
