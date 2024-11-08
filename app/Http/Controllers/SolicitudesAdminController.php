<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesAdmin extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_admin';

    protected $fillable = [
        'email',
        'token',
        'is_used',
    ];
}
