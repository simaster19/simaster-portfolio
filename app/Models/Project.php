<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primaryKey = "id_project";
    public $keyatype = "int";
    public $timestamps = true;

    protected $guarded = ["id_project"];

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, "id_project", "id_project");
    }
}
