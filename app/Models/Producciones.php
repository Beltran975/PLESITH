<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producciones extends Model
{
    //use HasFactory;
    protected $table = 'producciones';
    protected $primaryKey = 'id_pro';

    public $timestamps=false;

    protected $fillable=[
        'tipo',
        'evidencia',
        'autores',
        'titulo',
        'descripcion',
        'pais',
        'year',
        'proposito',
    ];
}
