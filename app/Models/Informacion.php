<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    //use HasFactory;
    protected $table = 'infoPlesith';
    protected $primaryKey = 'id_inf';

    public $timestamps=false;

    protected $fillable = [
        'lineaInv',
        'grado',
        'evidenciaGrado',
        'pertenece',
        'evidenciaSni',
    ];
}
