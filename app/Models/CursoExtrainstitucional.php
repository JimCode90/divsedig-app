<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoExtrainstitucional extends Model
{
    use HasFactory;
    protected $table = "cursos_extrainstitucionales";
    protected $fillable = [
        "id_user",
        "anio",
        "id_relacion_curso",
    ];

    public function nombreCurso(): BelongsTo
    {
        return $this->belongsTo(RelacionCurso::class, 'id_relacion_curso', 'id');
    }
}
