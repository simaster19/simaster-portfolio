<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";
    protected $primaryKey = "id_image";
    public $keyatype = "int";
    public $timestamps = false;

    protected $guarded = ["id_image"];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, "id_project", "id_project");
    }
}
