<?php

namespace App\Http\Livewire;

use App\Mail\ConsultoriasIncompanyEmail;
use App\Mail\NuevaSolicitudConsultoriaIncompanyEmail;
use Livewire\Component;
use App\Models\ConsultoriasXusuarios;
use App\Models\Area;
use Illuminate\Support\Facades\Mail;

class ConsultoriasDashboard extends Component
{
    public $id_area,$nombres,$email,$whatsApp,$empresa,$descripcion_consultoria;

    protected $messages = [
        'nombres' => 'Este campo no puede estar vacio.',
        'email' => 'Este campo no puede estar vacio.',
        'whatsApp' => 'Este campo no puede estar vacio.',
        'empresa' => 'Este campo no puede estar vacio.',
        'id_area' => 'Este campo no puede estar vacio.',
        'descripcion_consultoria' => 'Este campo no puede estar vacio.',
    ];

    public function render()
    {
        $areas = Area::where('activo', true)->get();

        return view('livewire.consultorias-dashboard.view', [
            'areas' => $areas
        ]);
    }

    public function store()
    {

        $this->validate([
            'nombres' => 'required',
            'email' => 'required',
            'whatsApp' => 'required',
            'empresa' => 'required',
            'id_area' => 'required',
            'descripcion_consultoria' => 'required',
        ]);

        $consultoria_x_usuario = ConsultoriasXusuarios::create([
            'nombres' => $this->nombres,
            'email' => $this->email,
            'whatsapp' => $this->whatsApp,
            'empresa' => $this->empresa,
            'id_area' => $this->id_area,
            'descripcion_consultoria' => $this->descripcion_consultoria
        ]);

        $usuario_registrado = $consultoria_x_usuario->nombres;
        $email_usuario_registrado = $consultoria_x_usuario->email;
        $whatsapp_usuario_registrado = $consultoria_x_usuario->whatsapp;
        $empresa_usuario_registrado = $consultoria_x_usuario->empresa;
        $nombre_area = Area::where('id',$consultoria_x_usuario->id_area)->pluck('nombre')->first();

        Mail::to($email_usuario_registrado)->send(new ConsultoriasIncompanyEmail($usuario_registrado,$nombre_area));
        Mail::to('administracion@coyca-consultoria.com')->send(new NuevaSolicitudConsultoriaIncompanyEmail($usuario_registrado,
        $email_usuario_registrado,$whatsapp_usuario_registrado,$empresa_usuario_registrado,$nombre_area));

        $this->reset('nombres', 'email', 'whatsApp', 'empresa', 'id_area','descripcion_consultoria');
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }
}
