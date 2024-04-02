<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Nodo; // Ajusta según la ubicación real de tu modelo

class ReportenodoController extends Controller
{
    public function generar()
    {
        // Obtener los datos de la tabla
        $producciones = Nodo::all();

        // Crear una nueva instancia de Dompdf
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Generar contenido HTML para el PDF
        $html = view('administrador.modalNodo', compact('producciones'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('reporte-nodos.pdf');
    }
}
