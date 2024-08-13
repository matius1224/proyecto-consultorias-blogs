<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevoRegistroEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_registrado,$correo_usuario_registrado,$cargo_usuario_registrado,$empresa_usuario_registrado,
    $requerimiento_usuario_registrado,$nombre_capacitacion;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario_registrado,$correo_usuario_registrado,$cargo_usuario_registrado,
    $empresa_usuario_registrado,$requerimiento_usuario_registrado,$nombre_capacitacion)
    {
        $this->usuario_registrado = $usuario_registrado;
        $this->correo_usuario_registrado = $correo_usuario_registrado;
        $this->cargo_usuario_registrado = $cargo_usuario_registrado;
        $this->empresa_usuario_registrado = $empresa_usuario_registrado;
        $this->requerimiento_usuario_registrado = $requerimiento_usuario_registrado;
        $this->nombre_capacitacion = $nombre_capacitacion;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo usuario registrado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.capacitaciones-dashboard.emailNuevoUsuarioRegistrado',
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
