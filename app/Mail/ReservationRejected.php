<?php

namespace App\Mail;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationRejected extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;

    public function __construct(Reserva $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->view('administrador.Mail-reserva-negada')
        ->subject('Reserva Negada');
        
    }
    
}
