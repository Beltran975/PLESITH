<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudCorreoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $enlace;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enlace)
    {
        $this->enlace = $enlace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.solicitudes-correo-admin')
                    ->subject('Solicitud de Enlace');
    }
}
