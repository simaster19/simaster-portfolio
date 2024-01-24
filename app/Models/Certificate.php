<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = "certificates";
    protected $primaryKey = "id_certificate";
    public $keyatype = "int";
    public $timestamps = true;

    protected $guarded = ["id_certificate"];
}
