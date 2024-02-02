<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Project;

class Testimonial extends Model
{
  use HasFactory;

  protected $table = "testimonials";
  protected $primaryKey = "id_testimonial";
  public $keyatype = "int";
  public $timestamps = true;

  protected $guarded = ["id_testimonial"];

  public function project():BelongsTo {
    $this->belongsTo(Project::class, "id_project", "id_project");
  }
}