<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Postulaciones;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $user = Auth::user();
        $data = User::all();

        $pdf = PDF::loadView('pdfPostulacion', compact('user', 'data'));
        
        // Guardar el PDF en el almacenamiento público
        $pdfFilename = $user->name . '_Postulacion.pdf';        
        $pdf->save(storage_path('app/public/postulaciones/' . $pdfFilename));
        
        // Llamar a la función para insertar en la tabla de postulaciones
        $this->insertProduccionRecord($pdfFilename);

        return $pdf->download($pdfFilename);
    }

    public function insertProduccionRecord($filename)
    {
        // Insertar el registro en la tabla de postulaciones
        Postulaciones::create([
            'user_id' => Auth::id(),
            'pdfPostulacion' => $filename,
            'estatus' => 'No revisado',
            'pdfDictamen' => '',
            
        ]);

        // Puedes personalizar este método según la estructura de tu tabla de postulaciones
    }
}
