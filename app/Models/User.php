<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 
        'email',
        'curp',
        'institucion',
        'programa',
        'password',
        'archivoCurp',
        'image_path',
        'tipo',
        'verificacion',
        'fullacces',
        'codigo',
    ];

    public function postulaciones()
    {
        return $this->hasMany(Postulaciones::class, 'user_id');
    }

    public function producciones() //Producciones
    {
        return $this->hasMany(Producciones::class, 'id_user');
    }

    public function datos()
    {
        return $this->hasMany(Informacion::class, 'id_user');
    }

    public function nodos()
    {
        return $this->hasMany(Nodo::class,'id_user');
    }
        public function nodosColab()
        {
            return $this->hasMany(Nodo::class,'colaboradores');
        }

    public function mensajes()
    {
        return $this->hasMany(MensajesUsers::class,'id_user_emisor');
    }

    public function mensajesRecibidos()
    {
        return $this->hasMany(MensajesUsers::class,'id_user_destinatario');
    }

}
