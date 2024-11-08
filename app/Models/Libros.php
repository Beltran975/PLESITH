<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    protected $table = 'libros';
    protected $fillable = ['produccion_id', 'editorial', 'edicion', 'paginas', 'estado'];

    public function produccion()
    {
        return $this->belongsTo(Producciones::class, 'produccion_id');
    }
}

