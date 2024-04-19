<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class emailAceptarSoli extends Mailable
{
    use Queueable, SerializesModels;

    protected $Solicolaborador;

    public function __construct($colaborador)
    {
        $this->Solicolaborador = $colaborador;
    }

    public function build()
    {
        return $this->view('administrador.postulaciones.CorreoAceptarSoli') 
                    ->with(['colaborador' => $this->Solicolaborador])->subject('Estatus de solicitud en nodos colaboración'); 
    }
}
