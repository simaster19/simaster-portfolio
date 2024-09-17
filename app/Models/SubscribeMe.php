<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class SubscribeMe extends Model
{
  use HasFactory, Notifiable;

  protected $table = "subscribe_me";
  protected $primaryKey = "id";
  public $keyType = "int";
  public $timestamps = true;

  protected $guarded = ["id"];

}