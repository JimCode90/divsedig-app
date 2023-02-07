<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoInstitucional extends Model
{
    use HasFactory;
    protected $table = "cursos_institucionales";
    protected $fillable = [
        "id_user",
        "anio",
        "nombre",
    ];
}
