<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'user_id',
        'telefono',
        'departamento',
        'institucion_laboratorio',
        'carrera_laboratorio',
        'laboratorio',
        'responsable',
        'tipo_equipo',
        'fecha_inicio',
        'fecha_fin',
        'motivo',
        'titulo_proyecto',
        'descripcion_proyecto',
        'supervisores',
        'curso_relacionado',
        'software_necesario',
        'aprobado1',
        'aprobado2',
    ];

    // Relación con el usuario que realizó la reserva
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aprobado1()
    {
        return $this->belongsTo(User::class, 'aprobado1');
    }

    public function aprobado2()
    {
        return $this->belongsTo(User::class, 'aprobado2');
    }
}
