<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaSolicitudIncompanyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_registrado,$correo_usuario_registrado,$whatsapp_usuario_registrado,$empresa_usuario_registrado,
    $requerimiento_usuario_registrado,$nombre_area;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario_registrado,$correo_usuario_registrado,$whatsapp_usuario_registrado,
    $empresa_usuario_registrado,$requerimiento_usuario_registrado,$nombre_area)
    {
        $this->usuario_registrado = $usuario_registrado;
        $this->correo_usuario_registrado = $correo_usuario_registrado;
        $this->whatsapp_usuario_registrado = $whatsapp_usuario_registrado;
        $this->empresa_usuario_registrado = $empresa_usuario_registrado;
        $this->requerimiento_usuario_registrado = $requerimiento_usuario_registrado;
        $this->nombre_area = $nombre_area;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva solicitud capacitación incompany',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.capacitaciones-dashboard.emailNuevaSolicitudIncompany',
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
