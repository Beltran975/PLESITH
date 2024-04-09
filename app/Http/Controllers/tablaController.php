<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulaciones;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailDictamenAprobacion;
use App\Mail\emailDictamenNegado;
use Illuminate\Support\Facades\Redirect;

class tablaController extends Controller
{
    public function mostrarDatos()
    {
        $users = User::with('postulaciones')->get();

        return view('administrador.postulaciones.tabla', compact('users'));
    }

    /*Funciones para aprobar las postulaciones*/
    public function FormAprobar($PosId)
    {
        $pos = Postulaciones::with('user')->findOrFail($PosId);
        return view('administrador.postulaciones.form-aprobar', compact('pos'));
    }

    public function generarPDFaprobado(Request $request, $id)
    {
        $postulacion = Postulaciones::with('user')->findOrFail($id);
        $postulacion->estatus = 'Aprobado';
        $nombreUsuario = $postulacion->user->name;
        $postulacion->pdfDictamen = 'Dictamen_aprobado_' . $nombreUsuario. '.pdf';
       $postulacion->save(); 

        // Generar el pdf del dictamen con datos del formulario
        $descripcion = $request->input('descripcion-apro');
        $razonAprobacion = $request->input('razonAprobacion');
        $razonTextArea = $request->input('razonTextArea');
        $datosUser = Postulaciones::with('user')->findOrFail($id);


        $pdf = PDF::loadView('administrador.postulaciones.dictamen-aprobado', compact('descripcion', 'razonAprobacion', 'razonTextArea', 'datosUser'));

        // Guardar pdf en la carpeta de "aprobados" dentro de "dictamenes"
        $pdfPath = '/documentos-admin/dictamenes/aprobados/Dictamen_aprobado_' . $nombreUsuario . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Obtener el usuario asociado a la postulación
        $usuario = $postulacion->user;
        $usuario->tipo = 'revisado';
        $usuario->save();
        // Enviar correo electrónico al usuario
        Mail::to($usuario->email)->send(new emailDictamenAprobacion($postulacion));

        // Descargar el PDF
        return $pdf->download('Dictamen_aprobado_' . $nombreUsuario . '.pdf');
        return redirect()->route('/tabla');

    }


    /*Funciones para negar las postulaciones*/
    public function FormNegar($PosId)
    {

    $pos = Postulaciones::with('user')->findOrFail($PosId);
        return view('administrador.postulaciones.form-negar', compact('pos'));
    }

    public function generarPDFnegado(Request $request, $id)
    {

        //Actualizar los datos de postulación
        $postulacion = Postulaciones::with('user')->findOrFail($id);
        $postulacion->estatus = 'Negado';
        $nombreUsuario = $postulacion->user->name;
        $postulacion->pdfDictamen = 'Dictamen_negado_' . $nombreUsuario . '.pdf';
        $postulacion->save();

        //Generar el pdf del dictamen con datos del formulario
        $descripcionNega = $request->input('decripcion-negada');
        $razonNegacion = $request->input('razon-negada');
        $razonTextAreaNegacion = $request->input('reazon-nega-Text');
        $datosUser = Postulaciones::with('user')->findOrFail($id);


        $pdf = PDF::loadView('administrador.postulaciones.dictamen-negado', compact('descripcionNega', 'razonNegacion', 'razonTextAreaNegacion', 'datosUser'));

        //Guardar pdf en la carpeta de "negados" dentro de "dictamenes" 
        $pdfPath = '/documentos-admin/dictamenes/negados/Dictamen_negado_' . $nombreUsuario . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Obtener el usuario asociado a la postulación
        $usuario = $postulacion->user;
        $usuario->tipo = 'revisado';
        $usuario->save();

        // Enviar correo electrónico al usuario
        Mail::to($usuario->email)->send(new emailDictamenNegado($postulacion));
        
        //Descargar el pdf
        return $pdf->download('Dictamen_negado_' . $nombreUsuario. '.pdf');

        return redirect()->route('administrador.tabla');
    }

}
