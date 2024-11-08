<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogo'; // Especifica el nombre de la tabla

    protected $fillable = [
        'user_id',
        'nombrepro',
        'descripcion',
        'imagen',
        'categoria',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
