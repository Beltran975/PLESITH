<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postulaciones;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;


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


    public function generarPDFaprobado(Request $request)
    {
        $descripcion = $request->input('descripcion-apro');
        $razonAprobacion = $request->input('razonAprobacion');
        $razonTextArea = $request->input('razonTextArea');
        

        

        // Genera el PDF con los datos recibidos
        $pdf = PDF::loadView('administrador.postulaciones.dictamen-aprobado', compact('descripcion', 'razonAprobacion', 'razonTextArea'));
        
        //Guardar el dictamen dentro de la carpta de dictamenes
        $pdfPath ='storage/dictamenes/Dictamenpdf';
        $pdf->save(public_path($pdfPath));

        
        // Descarga el PDF
        return $pdf->download('Dictamen.pdf');
    }

    /*Funciones para negar las postulaciones*/
    public function FormNegar()
    {
        return view('administrador.postulaciones.form-negar');
    }
}
