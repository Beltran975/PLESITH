<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoPlesith extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'info_plesith';

    // Si no usas los timestamps
    public $timestamps = false;

    // Definir las relaciones, en este caso con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_user');
    }
}
