<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
  use HasFactory;

  protected $table = "posts";
  protected $primaryKey = "id_post";
  public $keyatype = "int";
  public $timestamps = true;

  public function user():BelongsTo {
    return $this->belongsTo(User::class, "id_user", "id_user");
  }
  
  public function category():BelongTo{
    return $this->belongsTo(Category::class,"id_category","id_category");
  }
}