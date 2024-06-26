<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = [
        'nombre', 'paterno', 'materno', 'ci',
        'ci_exp', 'lugar_nac', 'fecha_nac', 'edad',
        'sexo', 'estado_civil', 'zona', 'avenida',
        'nro', 'fono', 'cel', 'email',
        'nro_rda', 'afp', 'nua', 'item_fiscal',
        'nro_seguro_social', 'caja_seguro_social', 'titulado', 'gestiones_trabajo',
        'cargo', 'mes', 'observaciones', 'foto', 'fecha_registro',
        'user_id', 'estado',
    ];

    protected $appends = ["full_name", "full_ci"];
    public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->paterno . ' ' . $this->materno;
    }

    public function getFullCiAttribute()
    {
        return $this->ci . ' ' . $this->ci_exp;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function estudios()
    {
        return $this->hasMany(ProfesorEstudio::class, 'profesor_id');
    }

    public function cursos()
    {
        return $this->hasMany(ProfesorCurso::class, 'profesor_id');
    }

    public function otros()
    {
        return $this->hasMany(ProfesorOtro::class, 'profesor_id');
    }

    public function trabajos()
    {
        return $this->hasMany(ProfesorTrabajo::class, 'profesor_id');
    }

    public function materias()
    {
        return $this->hasMany(ProfesorMateria::class, 'profesor_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'profesor_id');
    }
}
