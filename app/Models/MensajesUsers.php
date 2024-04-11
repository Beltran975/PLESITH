<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajesUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'mensaje',
        'id_user_emisor',
        'id_user_destinatario'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
