<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
  protected $primaryKey = "id_project";
  public $keyatype = "int";
  public $timestamps = true;
}
