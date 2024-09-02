<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $table = "comments";
  protected $primaryKey = "id_comment";
  public $keyatype = "int";
  public $timestamps = true;

  //public function users(): BelongsTo


}