<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulaciones;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailDictamen;

class DictamenController extends Controller
{
    public function aprobarPostulacion(Request $request, $id) 
    {
        // Validar que se haya enviado un archivo PDF
        $request->validate([
            'dictamenAprobar' => 'required|file|mimes:pdf', // Ajusta según tus necesidades
        ]);

        // Subir el archivo PDF a la carpeta de almacenamiento de Laravel
        $archivo = $request->file('dictamenAprobar');
        $nombreArchivo = $archivo->getClientOriginalName();
        $archivo->storeAs('dictamenes', $nombreArchivo);

        // Actualizar el estatus y el atributo del PDF en la base de datos
        $postulacion = Postulaciones::findOrFail($id);
        $postulacion->estatus = 'Aprobado';
        $postulacion->pdfdictamen = $nombreArchivo; // Guardar el nombre del archivo en el atributo pdfdictamen
        $postulacion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'La postulación ha sido aprobada correctamente.');
    }

///-------------------------------------
    //Funcion para negar postulación
    public function negarPostulacion(Request $request, $id) 
    {
        // Validar que se haya enviado un archivo PDF
        $request->validate([
            'dictamenNegar' => 'required|file|mimes:pdf', // Ajusta según tus necesidades
        ]);

        // Subir el archivo PDF a la carpeta de almacenamiento de Laravel
        $archivo = $request->file('dictamenNegar');
        $nombreArchivo = $archivo->getClientOriginalName();
        $archivo->storeAs('dictamenes', $nombreArchivo);

        // Actualizar el estatus y el atributo del PDF en la base de datos
        $postulacion = Postulaciones::findOrFail($id);
        $postulacion->estatus = 'Negado';
        $postulacion->pdfdictamen = $nombreArchivo; // Guardar el nombre del archivo en el atributo pdfdictamen
        $postulacion->save();

        //Usar el usuariorelacionado a la postulación
        $usuario = User::findorFail($postulacion->user_id);

        //Enviar correo electronico al usuario
        Mail::to($usuario->email)->send(new emailDictamen($postulacion));

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'La postulación ha sido negada correctamente.');
    }
}