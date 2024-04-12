<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Nodo;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //nombre de el modelo que contengs en campo 'email'
use App\Mail\CorreoColaborador;
use Illuminate\Support\Facades\Mail;
use App\Models\MensajesUsers;

class ListaNodosController extends Controller
{
    public function index()
    {
        $query = DB::table('nodo')->get();
        return view('nodo.nodosComunidad',['datos'=>$query]);
    }

    public function lista()
    {
        $query = Nodo::where('id_user', Auth::id())->with('user')->get();
        return view('nodo.listaNodos', ['datos' => $query]);
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
}
