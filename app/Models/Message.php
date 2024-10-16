<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
  use HasFactory,
  Notifiable;

  protected $table = "messages";
  protected $primaryKey = "id_message";
  public $keyType = "int";
  public $timestamps = true;

  protected $guarded = ["id_message"];

  public function user():BelongsTo
  {
    return $this->belongsTo(User::class, "id_user", "id_user");
  }
}