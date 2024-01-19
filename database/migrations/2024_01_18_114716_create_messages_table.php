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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements("id_message");
            $table->unsignedBigInteger("id_user");
            $table->string("nama")->nullable(false);
            $table->string("email")->nullable(false);
            $table->longText("message")->nullable(false);
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
        Schema::dropIfExists('messages');
    }
};
