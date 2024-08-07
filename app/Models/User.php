<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens,
  HasFactory,
  Notifiable,
 // SoftDeletes,
  HasRoles;

  protected $table = "users";
  protected $primaryKey = "id_user";
  public $keyType = "int";
  public $timestamps = true;



  protected $guarded = [
    "id_user"
  ];


  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function createRememberToken() {
    $token = Str::random(60);
    $this->update(['remember_token' => hash('sha256', $token)]);

    return $token;
  }

  public function validateRememberToken($token) {
    return hash_equals($this->remember_token, hash('sha256', $token));
  }


  public function message(): HasMany
  {
    return $this->hasMany(Message::class, "id_user", "id_user");
  }

  public function post(): HasMany
  {
    return $this->hasMany(Post::class, "id_user", "id_user");
  }
}