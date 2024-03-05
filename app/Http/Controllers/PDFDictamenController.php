<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class PDFDictamenController extends Controller
{
    public function generarPDF(Request $request)
    {
        $descripcion = $request->input('descripcion-apro');
        $razonAprobacion = $request->input('razonAprobacion');
        $razonTextArea = $request->input('razonTextArea');

        // Genera el PDF con los datos recibidos
        $pdf = PDF::loadView('administrador.documentos.dictamen-aprobado', compact('descripcion', 'razonAprobacion', 'razonTextArea'));

        // Descarga el PDF
        return $pdf->download('dictamen.pdf');
    }

    //pdf de negacion
    public function generarPDFnegado(Request $request)
    {
        $descripcionNega = $request->input('descripcion-nega');
        $razonNegada = $request->input('razon-negada');
        $razonTextAreaNegada = $request->input('razonTextArea-negada');

        // Genera el PDF con los datos recibidos
        $pdf = PDF::loadView('administrador.documentos.dictamen-negado', compact('descripcionNega', 'razonNegada', 'razonTextAreaNegada'));

        // Descarga el PDF
        return $pdf->download('dictamen-negado.pdf');
    }
}
