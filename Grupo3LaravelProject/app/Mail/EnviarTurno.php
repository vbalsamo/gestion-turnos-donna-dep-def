<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarTurno extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //Los datos que se envían en EnviarTurno

    public $datos;

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
            subject: 'Turno Reservado para '.$this->datos->tratamiento,
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
            view: 'enviarTurno.correo',
            with: [
                'fecha' => $this->datos->fecha,
                'hora' => $this->datos->hora,
                'cliente' => $this->datos->cliente,
                'profesional' => $this->datos->profesional,
                'tratamiento' => $this->datos->tratamiento,
                'locacion' => $this->datos->tratamiento,
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
