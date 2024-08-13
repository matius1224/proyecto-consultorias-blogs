<?php

namespace App\Http\Livewire;

use App\Models\Capacitacion;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Capacitaciones extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $keyWordUsuariosIncompany, $tema, $descripcion, $fechasHorarios, $imagen_encabezado,  $crear_capacitacion;

    public $isOpen, $isOpenModalActivarInactivar, $activar;
    public $activos = true;
    public $paginador = 10;

    protected $messages = [
        'imagen_encabezado.image' => 'Solo se deben cargar imágenes.',
        'tema.required' => 'Este campo no puede estar vacio.',
        'fechasHorarios.required' => 'Este campo no puede estar vacio.',
        'descripcion.required' => 'Este campo no puede estar vacio.'
    ];

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $capacitaciones = Capacitacion::where('activo', $this->activos)->where(
            fn ($query) =>
            $query->where('tema', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
        )->orderBy('id','asc'); 

        $total = $capacitaciones->count(); 

        if ($this->activos) {
            return view('livewire.capacitaciones.viewActivos', [
                'capacitaciones' => $capacitaciones->paginate($this->paginador),
                'total' => $total
            ]);
        } else {
            return view('livewire.capacitaciones.viewInactivos', [
                'capacitacionesInactivos' => $capacitaciones->paginate($this->paginador),
                'total' => $total
            ]);
        }
    }

    public function store()
    {

        $this->validate([
            'imagen_encabezado' => 'required',
            'tema' => 'required',
            'descripcion' => 'required',
            'fechasHorarios' => 'required'
        ]);

        $capacitaciones = Capacitacion::create([
            'tema' => $this->tema,
            'descripcion' => $this->descripcion,
            'fechasHorarios' => $this->fechasHorarios,
            'activo' => true
        ]);

        $id_capacitaciones = $capacitaciones->id;

        // Genera un nombre de archivo único
        $filename = $id_capacitaciones . '.' . $this->imagen_encabezado->getClientOriginalExtension();

        // Almacena la imagen en la carpeta "fotos_blog" de la ruta de almacenamiento
        $ruta_imagen = $this->imagen_encabezado->storeAs('fotos_capacitaciones', $filename, 'public');

        $data = [];
        $data['imagen_encabezado'] = $ruta_imagen;

        Capacitacion::whereId($id_capacitaciones)->update($data);

        $this->reset('imagen_encabezado', 'tema',  'descripcion', 'fechasHorarios');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }

    public function edit($id)
    {
        $record = Capacitacion::findOrFail($id);

        $this->selected_id = $id;
        $this->imagen_encabezado = $record->imagen_encabezado;
        $this->tema = $record->tema;
        $this->descripcion = $record->descripcion;
        $this->fechasHorarios = $record->fechasHorarios;

        $this->openModal();
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Capacitacion::find($this->selected_id);
            if ($this->imagen_encabezado != $record->imagen_encabezado) {

                $this->validate([
                    'imagen_encabezado' => 'required',
                    'tema' => 'required',
                    'descripcion' => 'required',
                    'fechasHorarios' => 'required'
                ]);

                // Genera un nombre de archivo único
                $filename = $this->selected_id . '.' . $this->imagen_encabezado->getClientOriginalExtension();

                // Almacena la imagen en la carpeta "fotos_blog" de la ruta de almacenamiento
                $ruta_imagen = $this->imagen_encabezado->storeAs('fotos_capacitaciones', $filename, 'public');

                $record->update([
                    'tema' => $this->tema,
                    'descripcion' => $this->descripcion,
                    'fechasHorarios' => $this->fechasHorarios,
                    'imagen_encabezado' => $ruta_imagen
                ]);
            } else {
                $this->validate([
                    'tema' => 'required',
                    'descripcion' => 'required',
                    'fechasHorarios' => 'required'

                ]);

                $record->update([
                    'tema' => $this->tema,
                    'descripcion' => $this->descripcion,
                    'fechasHorarios' => $this->fechasHorarios,
                ]);
            }

            $this->reset('imagen_encabezado', 'tema', 'descripcion', 'fechasHorarios');
            $this->closeModal();
            $this->resetValidation();
            $this->dispatch('eventoActualizar');
        }
    }

    public function activarCapacitacion($id)
    {
        $record = Capacitacion::find($id);
        $record->update([
            'activo' => true
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoActivar');
    }

    public function inactivarCapacitacion($id)
    {
        $record = Capacitacion::find($id);
        $record->update([
            'activo' => false
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoInactivar');
    }

    public function modalActivar($id)
    {
        $this->selected_id = $id;
        $this->activar = true;
        $this->OpenModalActivarInactivar();
    }

    public function modalInactivar($id)
    {
        $this->selected_id = $id;
        $this->activar = false;
        $this->OpenModalActivarInactivar();
    }

    public function openModal()
    {
        $this->crear_capacitacion = true;
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->selected_id = null;
        $this->reset('imagen_encabezado', 'tema', 'descripcion', 'fechasHorarios');
        $this->isOpen = false;
    }

    public function openModalActivarInactivar()
    {
        $this->isOpenModalActivarInactivar = true;
    }

    public function closeModalActivarInactivar()
    {
        $this->isOpenModalActivarInactivar = false;
    }

}

