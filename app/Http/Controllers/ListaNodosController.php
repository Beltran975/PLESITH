<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //nombre de el modelo que contengs en campo 'email'
use App\Mail\CorreoColaborador;
use App\Mail\emailSolicitudColab;
use App\Mail\emailAceptarSoli;
use Illuminate\Support\Facades\Mail;
use App\Models\MensajesUsers;

class ListaNodosController extends Controller
{
    public function index()
    {
        $datos = User::all();
        return view('nodo.nodosComunidad', compact('datos'));
    }

    public function lista()
    {
        $datos = User::all();
        return view('nodo.listaNodos', compact('datos'));
    }

    public function destroy($id)
    {
        $query = Nodo::findOrFail($id);
        $query->delete();
        return redirect()->route('listaNodos');
    }

    public function obtenerCorreos()
    {
        $correos = User::pluck('email')->toArray(); // Obtener todos los correos electrónicos de la base de datos
        return response()->json($correos);
    }

    //Enviar invitación para colaborar en los nodos
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
                $mensajeUsuario->id_user_emisor     = auth()->user()->id; // Supongo que obtienes el ID del remitente de alguna manera
                $mensajeUsuario->id_user_destinatario     = $usuario->id;
                $mensajeUsuario->mensaje = auth()->user()->name . " te quiere invitar a que colabores en el Nodo '" . $nodo->tema_inv . "'";
                $mensajeUsuario->nodo_id = $nodo->id;
                $mensajeUsuario->save();

                // Envía el correo electrónico
                $correo = new CorreoColaborador($correoColaborador);
                Mail::to($correoColaborador)->send($correo);
            } else {
                
            }
        }

        return redirect()->route('home.index')->with('SendInvitacion', 'Solicitud aceptada');
    }

    //Solicitud para colaborar en un nodo 
    public function enviarSolicitud(Request $request, $nodoId)
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
                $mensajeUsuario->id_user_emisor     = auth()->user()->id; // Supongo que obtienes el ID del remitente de alguna manera
                $mensajeUsuario->id_user_destinatario     = $usuario->id;
                $mensajeUsuario->mensaje = auth()->user()->name . " quiere colaborar en tu Nodo '" . $nodo->tema_inv . "'";
                $mensajeUsuario->nodo_id = $nodo->id;
                $mensajeUsuario->save();

                // Envía el correo electrónico
                $correo = new emailSolicitudColab($correoColaborador);
                Mail::to($correoColaborador)->send($correo);
            } else {
               
            }
        }

        return redirect()->route('home.index')->with('solicitud', 'La solicitud se ha enviado correctamente.');
    }
}
