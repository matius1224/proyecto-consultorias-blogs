<?php

namespace App\Http\Livewire;

use App\Mail\CapacitacionesEmail;
use App\Mail\CapacitacionesIncompanyEmail;
use App\Mail\NuevaSolicitudIncompanyEmail;
use App\Mail\NuevoRegistroEmail;
use App\Models\Capacitacion;
use App\Models\CapacitacionesIncompanyXusuarios;
use App\Models\Area;
use App\Models\CapacitacionesXusuarios;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CapacitacionesDashboard extends Component
{

    protected $paginationTheme = 'bootstrap';
    public $isOpen, $selected_id, $nombres_usuario, $apellidos_usuario, $correo_usuario, $empresa_usuario, $cargo_usuario, $whatsapp;
    public $id_area,$nombres_usuario_incompany,$email_usuario_incompany,$whatsapp_usuario_incompany,$empresa_usuario_incompany,$descripcion_usuario_incompany;
    protected $messages = [
        'nombres_usuario.required' => 'Este campo no puede estar vacio.',
        'apellidos_usuario.required' => 'Este campo no puede estar vacio.',
        'whatsapp.required' => 'Este campo no puede estar vacio.',
       // 'fecha_nacimiento_usuario.date' => 'Ingrese una fecha de nacimiento valida.',
        'correo_usuario.required' => 'Este campo no puede estar vacio.',
        'empresa_usuario.required' => 'Este campo no puede estar vacio.',
        'cargo_usuario.required' => 'Este campo no puede estar vacio.',
        'nombres_usuario_incompany' => 'Este campo no puede estar vacio.',
        'email_usuario_incompany' => 'Este campo no puede estar vacio.',
        'whatsapp_usuario_incompany' => 'Este campo no puede estar vacio.',
        'empresa_usuario_incompany' => 'Este campo no puede estar vacio.',
        'id_area' => 'Este campo no puede estar vacio.',
        'descripcion_usuario_incompany' => 'Este campo no puede estar vacio.',
    ];
    public function render()
    {
        $capacitaciones = Capacitacion::where('activo', true)->get();
        $areas = Area::where('activo', true)->get();

        return view('livewire.capacitaciones-dashboard.view', [
            'capacitaciones' => $capacitaciones,
            'areas' => $areas
        ]);
    }

    public function openModal($id)
    {
        $this->selected_id = $id;
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->selected_id = null;
        $this->reset('nombres_usuario', 'apellidos_usuario', 'correo_usuario', 'empresa_usuario', 'cargo_usuario', 'whatsapp');
        $this->isOpen = false;
    }

    public function store()
    {

        $this->validate([
            'nombres_usuario' => 'required',
            'apellidos_usuario' => 'required',
            //'fecha_nacimiento_usuario' => ['required', 'date', 'before:today', 'after:1900-01-01'],
            'correo_usuario' => 'required',
            'whatsapp' => 'required',
            'empresa_usuario' => 'required',
            'cargo_usuario' => 'required'
        ]);

        $capacitacion_x_usuario = CapacitacionesXusuarios::create([
            'id_capacitacion' => $this->selected_id,
            'nombres_usuario' => $this->nombres_usuario,
            'apellidos_usuario' => $this->apellidos_usuario,
            'whatsapp' => $this->whatsapp,
            'correo_usuario' => $this->correo_usuario,
            'empresa_usuario' => $this->empresa_usuario,
            'cargo_usuario' => $this->cargo_usuario

        ]);

        $usuario_registrado = $capacitacion_x_usuario->nombres_usuario.' '.$capacitacion_x_usuario->apellidos_usuario;
        $nombre_capacitacion = Capacitacion::where('id',$capacitacion_x_usuario->id_capacitacion)->pluck('tema')->first();
        $fecha_capacitacion = Capacitacion::where('id',$capacitacion_x_usuario->id_capacitacion)->pluck('fechasHorarios')->first();

        Mail::to($capacitacion_x_usuario->correo_usuario)->send(new CapacitacionesEmail($usuario_registrado,$nombre_capacitacion,$fecha_capacitacion));
        Mail::to('administracion@coyca-consultoria.com')->send(new NuevoRegistroEmail($usuario_registrado,$capacitacion_x_usuario->correo_usuario,$capacitacion_x_usuario->empresa_usuario,$capacitacion_x_usuario->cargo_usuario,$capacitacion_x_usuario->descripcion_solicitud_usuario,$nombre_capacitacion));

        $this->reset('nombres_usuario', 'apellidos_usuario', 'whatsapp', 'correo_usuario', 'empresa_usuario', 'cargo_usuario');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }

    public function storeIncompany()
    {

        $this->validate([
            'nombres_usuario_incompany' => 'required',
            'email_usuario_incompany' => 'required',
            'whatsapp_usuario_incompany' => 'required',
            'empresa_usuario_incompany' => 'required',
            'id_area' => 'required',
            'descripcion_usuario_incompany' => 'required',
        ]);

        $capacitacion_incompany = CapacitacionesIncompanyXusuarios::create([
            'nombres_usuario_incompany' => $this->nombres_usuario_incompany,
            'email_usuario_incompany' => $this->email_usuario_incompany,
            'whatsapp_usuario_incompany' => $this->whatsapp_usuario_incompany,
            'empresa_usuario_incompany' => $this->empresa_usuario_incompany,
            'id_area' => $this->id_area,
            'descripcion_usuario_incompany' => $this->descripcion_usuario_incompany
        ]);

        $usuario_registrado = $capacitacion_incompany->nombres_usuario_incompany;
        $email_usuario_registrado = $capacitacion_incompany->email_usuario_incompany;
        $whatsapp_usuario_registrado = $capacitacion_incompany->whatsapp_usuario_incompany;
        $empresa_usuario_registrado = $capacitacion_incompany->empresa_usuario_incompany;
        $requerimiento_usuario_registrado = $capacitacion_incompany->descripcion_usuario_incompany;
        $nombre_area = Area::where('id',$capacitacion_incompany->id_area)->pluck('nombre')->first();

        Mail::to($capacitacion_incompany->email_usuario_incompany)->send(new CapacitacionesIncompanyEmail($usuario_registrado,$nombre_area));
        Mail::to('administracion@coyca-consultoria.com')->send(new NuevaSolicitudIncompanyEmail($usuario_registrado,
        $email_usuario_registrado,$whatsapp_usuario_registrado,$empresa_usuario_registrado,
        $requerimiento_usuario_registrado,$nombre_area));

        $this->reset('nombres_usuario_incompany', 'email_usuario_incompany', 'whatsapp_usuario_incompany', 'empresa_usuario_incompany', 'id_area', 'descripcion_usuario_incompany');
        $this->resetValidation();
        $this->dispatch('eventoCrearIncompany');
    }
}
