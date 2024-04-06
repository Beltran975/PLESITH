<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Colaboradores;

class CorreoColaborador extends Mailable
{
    use Queueable, SerializesModels;

    protected $colaborador;

    public function __construct($colaborador)
    {
        $this->colaborador = $colaborador;
    }

    public function build()
    {
        return $this->view('administrador.postulaciones.ColaboradorCorreo') 
                    ->with(['colaborador' => $this->colaborador]); 
    }
}
