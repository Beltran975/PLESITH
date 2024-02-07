<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docInvestigacion extends Model
{
    //use HasFactory;

    protected $table = 'dovInves';
    protected $primaryKey = 'id_docInv';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'year',
        'documento',
        'descripcion',
    ];
}
