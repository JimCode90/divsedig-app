<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = "proyectos";
    protected $fillable = [
        "id_user",
        "anio",
        "titulo",
        "descripcion",
        "status",
        "fecha_ini",
        "fecha_fin",
    ];
}
