<?php

namespace App\Mail;

use App\Models\Reserva;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;
    public $reason;

    public function __construct(Reserva $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {

        return $this->view('administrador.Mail-reserva-aceptada')
                    ->attach(public_path('documentos-users/reservas/tickets/' . $this->reservation->ticket), [
                        'as' => 'Reserva.pdf',
                    ]);
        
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reserva Aceptada',
        );
    }
}
