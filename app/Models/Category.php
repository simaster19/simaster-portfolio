<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Relations\HasMany;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";
    protected $primaryKey = "id_category";
    public $keyatype = "int";
    public $timestamps = true;

    protected $guarded = ["id_category"];
    
    public function post():HasMany{
      return $this->hasMany(Post::class,"id_category","id_category");
    }
}
