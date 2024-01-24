<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = "skills";
  protected $primaryKey = "id_skill";
  public $keyatype = "int";
  public $timestamps = true;
  
  protected $guarded = ["id_skill"];
}
