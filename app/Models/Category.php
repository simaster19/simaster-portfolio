<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id_category";
    public $keyatype = "int";
    public $timestamps = true;

    protected $guarded = ["id_category"];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class, "id_category", "id_category");
    }
}
