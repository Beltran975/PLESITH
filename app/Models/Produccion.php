<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    protected $fillable =[
        'tipo',
        'evidencia',
        'autor_es',
        'titulo',
        'descripcion',
        'pais',
        'year',
        'proposito',
    ];
}
