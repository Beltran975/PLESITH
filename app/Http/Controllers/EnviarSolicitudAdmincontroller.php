<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarSolicitudAdminController extends Controller
{
    public function index()
    {
        return view('administrador.enviar-solicitud-admin');
    }

    public function enviar(Request $request)
    {
        // Validar múltiples correos separados por comas
        $request->validate(['emails' => 'required|string']);

        // Dividir los correos en un arreglo, y filtrar espacios en blanco
        $emails = array_map('trim', explode(',', $request->input('emails')));
        $enlace = 'https://example.com/solicitud';

        // Enviar el correo a cada dirección
        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Mail::raw("Haz clic en el siguiente enlace para completar la solicitud: $enlace", function ($message) use ($email) {
                    $message->to($email)
                            ->subject('Solicitud de Enlace');
                });
            }
        }

        return back()->with('success', 'Solicitudes enviadas correctamente');
    }
}
