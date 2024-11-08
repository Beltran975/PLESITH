<?php

// En el modelo Articulo

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'produccion_id', 
        'revista', 
        'volumen', 
        'paginas', 
        'issn', 
        'descripcion', 
        'estado', 
        'direccion_articulo'
    ];

    // Relación con Produccion
    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'produccion_id', 'id_pro');
    }
}

