<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = "testimonials";
    protected $primaryKey = "id_testimonial";
    public $keyatype = "int";
    public $timestamps = true;

    protected $guarded = ["id_testimonial"];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, "id_project", "id_project");
    }
}
