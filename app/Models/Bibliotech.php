<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliotech extends Model
{
    //use HasFactory;
    protected $table = 'bibliotech';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'year',
        'documento',
        'descripcion',
    ];
}
