<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\Recurso;
use App\Models\UsuarioXDescargaArticuloRecurso;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class RecursosDashboard extends Component
{
    public $selected_id, $keyWord, $nombres_usuario, $apellidos_usuario, $celular_usuario, $correo_usuario,
        $empresa_usuario, $cargo_usuario, $isOpen, $ruta_a_descargar, $id_recurso, $id_articulo;

    protected $messages = [
        'nombres_usuario.required' => 'Este campo no puede estar vacio.',
        'apellidos_usuario.required' => 'Este campo no puede estar vacio.',
        'celular_usuario.required' => 'Este campo no puede estar vacio.',
        'correo_usuario.required' => 'Este campo no puede estar vacio.',
        'empresa_usuario.required' => 'Este campo no puede estar vacio.',
        'cargo_usuario.required' => 'Este campo no puede estar vacio.'
    ];
    public function render()
    {
        $recursos = Recurso::where('activo', true)->get();
        $articulos = Articulo::where('activo', true)->get();
        return view('livewire.recursos-dashboard.view', [
            'recursos' => $recursos,
            'articulos' => $articulos
        ]);
    }

    public function store()
    {
        $this->validate([
            'nombres_usuario' => 'required',
            'apellidos_usuario' => 'required',
            'celular_usuario' => 'required',
            'correo_usuario' => 'required',
            'empresa_usuario' => 'required',
            'cargo_usuario' => 'required'
        ]);

        UsuarioXDescargaArticuloRecurso::create([
            'id_recurso' => $this->id_recurso,
            'id_articulo' => $this->id_articulo,
            'nombres_usuario' => $this->nombres_usuario,
            'apellidos_usuario' => $this->apellidos_usuario,
            'celular_usuario' => $this->celular_usuario,
            'correo_usuario' => $this->correo_usuario,
            'empresa_usuario' => $this->empresa_usuario,
            'cargo_usuario' => $this->cargo_usuario
        ]);

        $this->reset('nombres_usuario', 'apellidos_usuario', 'celular_usuario', 'correo_usuario', 'empresa_usuario', 'cargo_usuario');
        $this->isOpen = false;
        $this->resetValidation();
        $filePath = public_path('storage/' . $this->ruta_a_descargar);

        return response()->download($filePath);
    }

    public function abrirFormularioRecurso($ruta,$id_recurso)
    {
        $this->resetValidation();
        $this->ruta_a_descargar = $ruta;
        $this->id_articulo = null;
        $this->id_recurso = $id_recurso;
        $this->isOpen = true;
    }

    public function abrirFormularioArticulo($ruta,$id_articulo)
    {
        $this->resetValidation();
        $this->ruta_a_descargar = $ruta;
        $this->id_recurso = null;
        $this->id_articulo = $id_articulo;
        $this->isOpen = true;
    }

    public function cerrarFormulario()
    {
        $this->isOpen = false;
    }
}
