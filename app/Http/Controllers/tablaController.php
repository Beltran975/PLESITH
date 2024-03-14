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
        $pos = Postulaciones::findOrFail($PosId);
        return view('administrador.postulaciones.form-aprobar', compact('pos'));
    }

    public function generarPDFaprobado(Request $request, $id)
    {
        $postulacion = Postulaciones::findOrFail($id);
        $postulacion->estatus = 'Aprobado';
        $postulacion->pdfDictamen = 'Dictamen_aprobado_' . $id . '.pdf';
       $postulacion->save(); 

        // Generar el pdf del dictamen con datos del formulario
        $descripcion = $request->input('descripcion-apro');
        $razonAprobacion = $request->input('razonAprobacion');
        $razonTextArea = $request->input('razonTextArea');

        $pdf = PDF::loadView('administrador.postulaciones.dictamen-aprobado', compact('descripcion', 'razonAprobacion', 'razonTextArea'));

        // Guardar pdf en la carpeta de "aprobados" dentro de "dictamenes"
        $pdfPath = 'storage/dictamenes/aprobados/Dictamen_aprobado_' . $id . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Obtener el usuario asociado a la postulación
        $usuario = $postulacion->user;
        $usuario->tipo = 'revisado';
        $usuario->save();
        // Enviar correo electrónico al usuario
        Mail::to($usuario->email)->send(new emailDictamenAprobacion($postulacion));

        // Descargar el PDF
        return $pdf->download('Dictamen_aprobado_' . $id . '.pdf');
    }


    /*Funciones para negar las postulaciones*/
    public function FormNegar($PosId)
    {
        $pos = Postulaciones::findOrFail($PosId);
        return view('administrador.postulaciones.form-negar', compact('pos'));
    }

    public function generarPDFnegado(Request $request, $id)
    {

        //Actualizar los datos de postulación
        $postulacion = Postulaciones::FindOrFail($id);
        $postulacion->estatus = 'Negado';
        $postulacion->pdfDictamen = 'Dictamen_negado_' . $id . '.pdf';
        $postulacion->save();

        //Generar el pdf del dictamen con datos del formulario
        $descripcionNega = $request->input('decripcion-negada');
        $razonNegacion = $request->input('razon-negada');
        $razonTextAreaNegacion = $request->input('reazon-nega-Text');

        $pdf = PDF::loadView('administrador.postulaciones.dictamen-negado', compact('descripcionNega', 'razonNegacion', 'razonTextAreaNegacion'));

        //Guardar pdf en la carpeta de "negados" dentro de "dictamenes" 
        $pdfPath = 'storage/dictamenes/negados/Dictamen_negado' . $id . '.pdf';
        $pdf->save(public_path($pdfPath));

        // Obtener el usuario asociado a la postulación
        $usuario = $postulacion->user;
        $usuario->tipo = 'revisado';
        $usuario->save();

        // Enviar correo electrónico al usuario
        Mail::to($usuario->email)->send(new emailDictamenNegado($postulacion));
        
        //Descargar el pdf
        return $pdf->download('Dictamen_negado' . $id . '.pdf');
    }
}
