<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultoria extends Model
{
    use HasFactory;

    protected $table = 'consultorias'; // Nombre de la tabla

    protected $fillable = [
        'produccion_id',
        'alcance_objetivo',
        'empresa_beneficiaria',
        'estado',
    ];

    // Relación con la tabla 'produccion'
    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'produccion_id', 'id_pro');
    }
}
