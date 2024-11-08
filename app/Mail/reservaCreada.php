<?php

namespace App\Mail;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class reservaCreada extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;

    public function __construct(Reserva $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->view('administrador.Mail-reserva-creada')
        ->subject('Nueva Reserva Creada');
        
    }
}
