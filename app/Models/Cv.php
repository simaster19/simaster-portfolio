<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Cv extends Model
{
    use HasFactory;

    protected $table = "cv";
    protected $primaryKey = "id_cv";
    public $keyType = "int";
    public $timestamps = true;

    protected $guarded = ["id_cv"];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user", "id_user");
    }
}
