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
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements("id_user");
      $table->integer("role")->default(0);
        $table->text('foto')->nullable(true)->default(null);
        $table->string('nama');
        $table->date("tanggal_lahir");
        $table->string('email')->unique();
        $table->string("no_hp", 15)->default(null);
        $table->text("alamat")->nullable(true)->default(null);
        $table->string("kode_pos", 7)->nullable(true)->default(null);
        $table->string("kota")->nullable(true)->default(null);
        $table->string("kecamatan")->nullable(true)->default(null);
        $table->string("desa")->nullable(true)->default(null);
        $table->string("rt", 3)->nullable(true)->default(null);
        $table->string("rw", 3)->nullable(true)->default(null);
        $table->timestamp('email_verified_at')->nullable();
        $table->string("username")->unique();
        $table->text('password');
        $table->rememberToken();
        $table->timestamps();
      });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
      Schema::dropIfExists('users');
    }
  };