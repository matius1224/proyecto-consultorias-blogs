<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CapacitacionesIncompanyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_empresa_registrado,$nombre_area;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario_empresa_registrado,$nombre_area)
    {
        $this->usuario_empresa_registrado = $usuario_empresa_registrado;
        $this->nombre_area = $nombre_area;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gracias por su solicitud',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.capacitaciones-dashboard.emailIncompanyAgradecimientoRegistro',
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
