<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Postulaciones;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
class PdfController extends Controller
{
    public function generatePdf()
    {
        $user = Auth::user();
        $data = User::all();
        

        $pdf = PDF::loadView('pdfPostulacion', compact('user', 'data'));
        
        // Guardar el PDF en el almacenamiento público
        $pdfFilename = $user->name . '_Postulacion.pdf';        
        $pdf->save(public_path('/documentos-users/postulaciones/' . $pdfFilename));
        
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

        User::where('id', Auth::id())->update([
            'tipo' => 'postulado',
            
        ]);
        

        // Puedes personalizar este método según la estructura de tu tabla de postulaciones
    }

    //pdf con CV del usuario
    public function generateCV()
    {
        $user = Auth::user();
        $data = User::all();
        

        $pdf = PDF::loadView('pdf-cv', compact('user', 'data'));
        
        // Guardar el PDF en el almacenamiento público
        $pdfFilename = $user->name . '_CV_profile.pdf';        
        $pdf->save(storage_path('app/public/profiles/' . $pdfFilename));
        
        return $pdf->download($pdfFilename);
    }

    public function ReporteGeneralUsers()
    {
        $users = User::all();

        $pdf = PDF::loadView('administrador.postulaciones.reportes.reporte-users', compact('users'));

        $pdfFilename = 'Reporte_usuarios.pdf';
        $pdf->save(public_path('/documentos-admin/reportes/'.$pdfFilename));

        return $pdf->download(($pdfFilename));
    }

    public function ReporteNoRevisados()
    {
        $users = User::all();

        $pdf = PDF::loadView('administrador.postulaciones.reportes.reporte-no-revisados', compact('users'));

        $pdfFilename = 'Reporte_usuarios_no_revisados.pdf';
        $pdf->save(public_path('/documentos-admin/reportes/'.$pdfFilename));

        return $pdf->download(($pdfFilename));
    }

    public function ReportesRevisados()
    {
        $users = User::all();

        $pdf = PDF::loadView('administrador.postulaciones.reportes.reporte-revisados', compact('users'));

        $pdfFilename = 'Reporte_usuarios_revisados.pdf';
        $pdf->save(public_path('/documentos-admin/reportes/'.$pdfFilename));

        return $pdf->download(($pdfFilename));
    }
    
    public function usersInhabilitados()
    {
        $users = User::get();

        $pdf = PDF::loadView('administrador.postulaciones.reportes.reporte-users-inhabilitados', compact('users'));

        $pdfFilename = 'Reporte_usuarios_inhabilitados.pdf';
        $pdf->save(public_path('/documentos-admin/reportes/'.$pdfFilename));

        return $pdf->download(($pdfFilename));


    }
}
