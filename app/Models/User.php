<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_grado',
        'nombres',
        'apellidos',
        'email',
        'password',
        'id_division',
        'id_departamento',
        'id_seccion',
        'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado', 'id');
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'id_user', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_division', 'id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id');
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'id_seccion', 'id');
    }

    public function cursosInstitucionales(): HasMany
    {
        return $this->hasMany(CursoInstitucional::class, 'id_user', 'id');
    }

    public function cursosExtrainstitucionales(): HasMany
    {
        return $this->hasMany(CursoExtrainstitucional::class, 'id_user', 'id');
    }

    public function proyectos(): HasMany
    {
        return $this->hasMany(Proyecto::class, 'id_user', 'id');
    }
}
