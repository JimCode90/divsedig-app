<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionCurso extends Model
{
    use HasFactory;
    protected $table = "relacion_cursos";
    protected $fillable = [
        "id_tipo_curso",
        "descripcion"
    ];
}
