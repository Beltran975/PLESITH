<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion_investigadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'linea_investigacion',
        'grado_academico',
        'pertenece_SNI',
        'evidencia_SNI',
        'evidencia_grado_academico',

    ];
}
