<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecordatorioTurno extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Recordatorio de turno para '.$this->datos->getTratamiento(),
            //Para realizar una funcion antes de enviar el mail
            using: [],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'recordatorioTurno',
            with: [
                'fecha' => $this->datos->getFecha(),
                'hora' => $this->datos->getHora(),
                'cliente' => $this->datos->getCliente(),
                'profesional' => $this->datos->getProfesional(),
                'tratamiento' => $this->datos->getTratamiento(),
                'locacion' => $this->datos->getLocacion(),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
