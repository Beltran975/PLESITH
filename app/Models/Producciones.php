<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producciones extends Model
{
    //use HasFactory;
    protected $table = 'produccion';
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function libro()
{
    return $this->hasOne(Libros::class, 'produccion_id', 'id_pro');
}

// Relación con Articulos
public function articulos()
{
    return $this->hasMany(Articulo::class, 'produccion_id', 'id_pro');
}


 // Relación con la consultoria
 public function consultoria()
 {
     return $this->hasOne(Consultoria::class, 'produccion_id', 'id_pro');
 }
}
