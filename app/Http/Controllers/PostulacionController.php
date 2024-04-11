<?php

namespace App\Http\Controllers;

use App\Models\Postulaciones;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function marcarNoRevisado($id)
    {
        // Encuentra la postulación por su ID
        $postulacion = Postulaciones::findOrFail($id);

        // Cambia el estado a "no revisado"
        $postulacion->estatus = 'Inhabilitado';
        $postulacion->save();

        return redirect()->route('tabla');
    }
}
