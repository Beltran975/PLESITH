<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    //use HasFactory;
    protected $table = 'info_plesith';
    protected $primaryKey = 'id_inf';

    public $timestamps=false;

    protected $fillable = [
        'lineaInv',
        'grado',
        'evidenciaGrado',
        'pertenece',
        'evidenciaSni',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
