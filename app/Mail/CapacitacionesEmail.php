<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CapacitacionesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_registrado,$nombre_capacitacion,$fecha_capacitacion;
    /**
     * Create a new message instance.
     */
    public function __construct($usuario_registrado,$nombre_capacitacion,$fecha_capacitacion)
    {
        $this->usuario_registrado = $usuario_registrado;
        $this->nombre_capacitacion = $nombre_capacitacion;
        $this->fecha_capacitacion = $fecha_capacitacion;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gracias por registrarte!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.capacitaciones-dashboard.emailAgradecimientoRegistro',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
