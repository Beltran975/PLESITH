<?php

namespace App\Http\Controllers;

use App\Mail\reservaCreada;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ReservationApproved;
use App\Mail\ReservationRejected;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{
    public function create()
    {
        return view('administrador.postulaciones.tabla');
    }

    public function store(Request $request)
    {
        // Crear una nueva reserva con los datos del formulario
        $reserva = new Reserva();
        $reserva->user_id = auth()->user()->id; 
        $reserva->telefono = $request->telefono;
        $reserva->departamento = $request->departamento;
        $reserva->institucion_laboratorio = $request->institucionLaboratorio;
        $reserva->carrera_laboratorio = $request->carreraLaboratorio;
        $reserva->laboratorio = $request->laboratorio;
        $reserva->responsable = $request->responsable;
        $reserva->tipo_equipo = $request->tipoEquipo;
        $reserva->fecha_inicio = $request->fechaInicio;
        $reserva->fecha_fin = $request->fechaFin;
        $reserva->motivo = $request->motivo;
        $reserva->titulo_proyecto = $request->tituloProyecto;
        $reserva->descripcion_proyecto = $request->descripcionProyecto;
        $reserva->supervisores = $request->supervisores;
        $reserva->curso_relacionado = $request->cursoRelacionado;
        $reserva->software_necesario = $request->softwareNecesario;
        $reserva->estado = "No revisado";
        $reserva->pdfReserva = "";
        $reserva->ticket = "";
        
        // Guardar la reserva en la base de datos
        $reserva->save();

        // Generar PDF Reserva
        $pdf = PDF::loadView('reserva.solicitudReserva', ['reserva' => $reserva]);
        $pdfPath = auth()->user()->name . '_' . $reserva -> id . '_reserva.pdf';
        $pdf->save(public_path('/documentos-users/reservas/' . $pdfPath));

        // Generar PDF ticket
        $pdf = PDF::loadView('reserva.ticket', ['reserva' => $reserva]);
        $pdfTicket = auth()->user()->name . '_' . $reserva -> id . '_ticketReserva.pdf';
        $pdf->save(public_path('/documentos-users/reservas/tickets/' . $pdfTicket));

        //Guardar nombre de los archivos PDF en la Base de Datos
        $reserva->pdfReserva = $pdfPath;
        $reserva->ticket = $pdfTicket;
        $reserva->save();

        $adm2u = User::where('tipo', 'adm2')
                          ->where('institucion', $reserva->institucion_laboratorio)
                          ->get();

        foreach ($adm2u as $adm2User) {
            Mail::to($adm2User->email)->send(new reservaCreada($reserva));
        }

        // Redirigir exitosamente
        return redirect()->back()->with('success', 'Reserva creada correctamente');
        
    }

    // Aprobar reserva
    public function approveReservation($id)
    {
        //Actaulizar el estado de reserva a Aprobado
        $reserva = Reserva::find($id);
        $user = Auth::user();
        //$reservation->estado = 'Aprobar';
        

        if ($reserva->estado=="No revisado" || $reserva->estado == "Rechazado") {
            $reserva->aprobado1 = $user->id;
            $reserva->estado = 'Aprobado por el primer administrador';
        } elseif ($reserva->estado=="Aprobado por el primer administrador" && $user->id !== $reserva->aprobado1) {
            $reserva->aprobado2 = $user->id;
            $reserva->estado = 'Aprobado por ambos administradores';
            Mail::to($reserva->user->email)->send(new ReservationApproved($reserva));
        }else {
            return redirect()->back()->with('error', 'La reserva ya ha sido aprobada por ambos administradores');
        }
        $reserva->save();
        // Enviar correo al usuario
        //Mail::to($reservation->user->email)->send(new ReservationApproved($reservation));

        return redirect()->back()->with('success', 'Reserva aprobada con éxito');
    }

    // Rechazar reserva
    public function rejectReservation($id)
    {
        //Actaulizar el estado de reserva a Rechazado
        $reservation = Reserva::find($id);
        $reservation->estado = 'Rechazado';
        $reservation->save();

        // Enviar correo al usuario
        Mail::to($reservation->user->email)->send(new ReservationRejected($reservation));

        return redirect()->back()->with('success', 'Reserva rechazada con éxito');
    }

}