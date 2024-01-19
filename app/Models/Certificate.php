<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
  use HasFactory;

  protected $table = "certicates";
  protected $primaryKey = "id_certificate";
  public $keyatype = "int";
  public $timestamps = true; 
}