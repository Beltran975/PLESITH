<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{
    //use HasFactory;
    protected $table = 'nodos';
    protected $primaryKey = 'id_nod';

    public $timestamps = false;

    protected $fillable = [
        'tema_inv',
        'categoria',
        'linea_inv',
        'institucion_ligada',
        'descripcion',
        'documento',
    ];
    
}
