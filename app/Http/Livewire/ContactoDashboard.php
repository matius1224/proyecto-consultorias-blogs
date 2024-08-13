<?php

namespace App\Http\Livewire;

use App\Mail\AgradecimientoContactoEmail;
use App\Mail\NuevaSolicitudContactoEmail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactoDashboard extends Component
{
    public $nombre,$whatsapp,$correo,$empresa,$tema_interes;

    protected $messages = [
        'nombre' => 'Este campo no puede estar vacio.',
        'correo' => 'Este campo no puede estar vacio.',
        'whatsapp' => 'Este campo no puede estar vacio.',
        'empresa' => 'Este campo no puede estar vacio.',
        'tema_interes' => 'Este campo no puede estar vacio.',
    ];
    public function render()
    {
        return view('livewire.contacto-dashboard.view');
    }

    public function store()
    {
        $usuario_contacto = $this->nombre;
        $email_contacto = $this->correo;
        $whatsapp_contacto = $this->whatsapp;
        $empresa_contacto = $this->empresa;
        $tema_de_interes = $this->tema_interes;

        Mail::to($email_contacto)->send(new AgradecimientoContactoEmail());
        Mail::to('administracion@coyca-consultoria.com')->send(new NuevaSolicitudContactoEmail($usuario_contacto,
        $email_contacto,$whatsapp_contacto,$empresa_contacto,$tema_de_interes));

        $this->reset('nombre', 'correo', 'whatsapp', 'empresa', 'tema_interes');
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }
}
