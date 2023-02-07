<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = "perfiles";
    protected $fillable = [
        "id_user",
        "cip",
        "dni",
        "id_division",
        "id_departamento",
        "id_seccion",
        "tel_fijo",
        "tel_cell",
        "direccion",
    ];
}
