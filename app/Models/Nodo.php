<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{
    //use HasFactory;
    protected $table = 'nodo';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'tema_inv',
        'categoria',
        'lider',
        'colaboradores',
        'linea_inv',
        'institucion_ligada',
        'descripcion',
        'documento',
    ];
    
}
