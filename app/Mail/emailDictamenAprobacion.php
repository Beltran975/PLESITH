<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Postulaciones;

class emailDictamenAprobacion extends Mailable
{
    use Queueable, SerializesModels;
    public $postulacion;

    public function __construct(Postulaciones $postulacion)
    {
        $this->postulacion = $postulacion;
    }

    public function build()
    {
        return $this->view('administrador.Mail-postulacion-aprobada')
        ->subject('Estatus de postulación');
    }
}
