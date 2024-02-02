<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Reemplaza "TuModelo" con el nombre de tu modelo
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $user = Auth::user(); // Obtén el usuario autenticado
        $data = User::all(); // Obtén los datos de tu base de datos

        $pdf = PDF::loadView('pdfPostulacion', compact('user', 'data'));

        return $pdf->download('archivo.pdf');
    }
}
