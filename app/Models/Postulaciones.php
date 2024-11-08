<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pdfPostulacion',
        'estatus',
        'pdfDictamen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
