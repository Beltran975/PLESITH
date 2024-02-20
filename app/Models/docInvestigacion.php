<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docInvestigacion extends Model
{
    //use HasFactory;

    protected $table = 'bibliotech_admin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'year',
        'documento',
        'descripcion',
    ];
}
