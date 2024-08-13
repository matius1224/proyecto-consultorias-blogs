<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Articulos extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $ruta_archivo, $nombre, $crear_articulo;

    public $isOpen, $isOpenModalActivarInactivar, $activar;
    public $activos = true;

    public $paginador = 10;

    protected $messages = [
        'ruta_archivo.required' => 'Este campo no puede estar vacio.',
        'nombre.required' => 'Este campo no puede estar vacio.'
    ];
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $articulos = Articulo::where('activo', $this->activos)->where('nombre', 'LIKE', $keyWord)
        ->orderBy('id','asc');

        $total = $articulos->count();

        if ($this->activos) {
            return view('livewire.articulos.viewActivos', [
                'articulos' => $articulos->paginate($this->paginador),
                'total' => $total
            ]);
        } else {
            return view('livewire.articulos.viewInactivos', [
                'articulosInactivos' => $articulos->paginate($this->paginador),
                'total' => $total
            ]);
        }
    }

    public function store()
    {
        $this->validate([
            'ruta_archivo' => 'required',
            'nombre' => 'required'
        ]);

        // Genera un nombre de archivo único
        $filename = $this->nombre . '.' . $this->ruta_archivo->getClientOriginalExtension();

        // Almacena la imagen en la carpeta "articulos" de la ruta de almacenamiento
        $ruta_imagen = $this->ruta_archivo->storeAs('articulos', $filename, 'public');

        Articulo::create([
            'ruta_archivo' => $ruta_imagen,
            'nombre' => $this->nombre,
            'activo' => true
        ]);

        $this->reset('ruta_archivo', 'nombre');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }

    public function edit($id)
    {
        $record = Articulo::findOrFail($id);

        $this->selected_id = $id;
        $this->ruta_archivo = $record->ruta_archivo;
        $this->nombre = $record->nombre;

        $this->openModal();
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Articulo::find($this->selected_id);
            if ($this->ruta_archivo != $record->ruta_archivo) {

                $this->validate([
                    'ruta_archivo' => 'required',
                    'nombre' => 'required'
                ]);

                // Genera un nombre de archivo único
                $filename = $this->nombre . '.' . $this->ruta_archivo->getClientOriginalExtension();

                // Almacena la imagen en la carpeta "articulos" de la ruta de almacenamiento
                $ruta_imagen = $this->ruta_archivo->storeAs('articulos', $filename, 'public');

                $record->update([
                    'nombre' => $this->nombre,
                    'ruta_archivo' => $ruta_imagen
                ]);
            } else {
                $this->validate([
                    'nombre' => 'required'
                ]);

                $record->update([
                    'nombre' => $this->nombre
                ]);
            }

            $this->reset('ruta_archivo', 'nombre');
            $this->closeModal();
            $this->resetValidation();
            $this->dispatch('eventoActualizar');
        }
    }

    public function activarArticulo($id)
    {
        $record = Articulo::find($id);
        $record->update([
            'activo' => true
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoActivar');
    }

    public function inactivarArticulo($id)
    {
        $record = Articulo::find($id);
        $record->update([
            'activo' => false
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoInactivar');
    }

    public function openModal()
    {
        $this->crear_articulo = true;
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->selected_id = null;
        $this->reset('ruta_archivo', 'nombre');
        $this->isOpen = false;
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

    public function openModalActivarInactivar()
    {
        $this->isOpenModalActivarInactivar = true;
    }

    public function closeModalActivarInactivar()
    {
        $this->isOpenModalActivarInactivar = false;
    }
}
