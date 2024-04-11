<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //nombre de el modelo que contengs en campo 'email'
use App\Mail\CorreoColaborador;
use Illuminate\Support\Facades\Mail;
use App\Models\Nodo;
use App\Models\MensajesUsers;

class ColaboradoresController extends Controller
{
    public function obtenerCorreos()
    {
        $correos = User::pluck('email')->toArray(); // Obtener todos los correos electrónicos de la base de datos
        return response()->json($correos);
    }

    public function enviarCorreo(Request $request, $nodoId)
{
    
    $correoColaborador = $request->input('correo');

    // Verifica si el correo del colaborador es válido antes de enviar
    if ($correoColaborador) {
        // Encuentra al usuario asociado al correo electrónico
        $usuario = User::where('email', $correoColaborador)->first();

        $nodo = Nodo::find($nodoId);

        if ($usuario && $nodo) {
            // Crea un nuevo mensaje de usuario
            $mensajeUsuario = new MensajesUsers();
            $mensajeUsuario->id_user_emisor	 = auth()->user()->id; // Supongo que obtienes el ID del remitente de alguna manera
            $mensajeUsuario->id_user_destinatario	 = $usuario->id;
            $mensajeUsuario->mensaje = auth()->user()->name . " te quiere invitar a que colabores en el Nodo '" . $nodo->tema_inv . "'";
            $mensajeUsuario->nodo_id = $nodo->id;
            $mensajeUsuario->save();

            // Envía el correo electrónico
            $correo = new CorreoColaborador($correoColaborador);
            Mail::to($correoColaborador)->send($correo);
        } else {
            // Maneja la situación si no se encuentra el usuario
            // Por ejemplo, muestra un mensaje de error o registra un log
            // Puedes adaptar esta parte según tus necesidades
            // Por ejemplo: return back()->with('error', 'Usuario no encontrado');
        }
    }

    return redirect()->route('home.index');
}
public function aceptarInvitacion($mensajeId)
    {
        // Encuentra el mensaje por su ID
        $mensaje = MensajesUsers::findOrFail($mensajeId);

        // Encuentra el nodo relacionado con el mensaje
        $nodo = Nodo::findOrFail($mensaje->nodo_id);

        // Actualiza el campo colaboradores del nodo
        // Por ejemplo, podrías concatenar el ID del usuario que acepta la invitación
        // con los colaboradores existentes, separados por comas
        $nodo->colaboradores = $nodo->colaboradores ? $nodo->colaboradores . ',' . auth()->user()->id : auth()->user()->id;
        $nodo->save();

        // Redirige a donde desees después de aceptar la invitación
        return redirect()->route('home.index');
    }
}
