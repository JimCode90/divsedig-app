<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCompetencia extends Model
{
    use HasFactory;
    protected $table = 'tipo_compotencias';
    protected $fillable = ['descripcion'];
}
