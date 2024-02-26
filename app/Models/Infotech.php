<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infotech extends Model
{
    //use HasFactory;
    protected $table = 'infotech';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'year',
        'documento',
        'descripcion',
    ];
}
