<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaSolicitudContactoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario_contacto,$email_contacto,$whatsapp_contacto,$empresa_contacto,
    $tema_de_interes;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario_contacto,$email_contacto,$whatsapp_contacto,
    $empresa_contacto,$tema_de_interes)
    {
        $this->usuario_contacto = $usuario_contacto;
        $this->email_contacto = $email_contacto;
        $this->whatsapp_contacto = $whatsapp_contacto;
        $this->empresa_contacto = $empresa_contacto;
        $this->tema_de_interes = $tema_de_interes;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo contacto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'livewire.contacto-dashboard.emailNuevoUsuarioRegistrado',
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
