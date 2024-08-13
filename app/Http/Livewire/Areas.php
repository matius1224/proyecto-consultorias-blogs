<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Areas extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public $isOpen, $isOpenModalActivarInactivar, $activar;
    public $activos = true;

    public $paginador = 10;

    protected $messages = [
        'nombre.required' => 'Este campo no puede estar vacio.'
    ];

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $areas = Area::where('activo', $this->activos)->where(fn ($query) =>
        $query->where('nombre', 'LIKE', $keyWord))->orderBy('id','asc');

        $total = $areas->count();

        if ($this->activos) {
            return view('livewire.areas.viewActivos', [
                'areas' => $areas->paginate($this->paginador),
                'total' => $total,
            ]);
        } else {
            return view('livewire.areas.viewInactivos', [
                'areasInactivas' => $areas->paginate($this->paginador),
                'total' => $total,
            ]);
        }
    }

    public function store()
    {

        $this->validate([
            'nombre' => 'required'
        ]);

        Area::create([
            'nombre' => $this->nombre,
            'activo' => true
        ]);

        $this->reset('nombre');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }

    public function edit($id)
    {
        $record = Area::findOrFail($id);

        $this->selected_id = $id;
        $this->nombre = $record->nombre;

        $this->openModal();
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Area::find($this->selected_id);

            $this->validate([
                'nombre' => 'required'
            ]);

            $record->update([
                'nombre' => $this->nombre
            ]);
        }

        $this->reset('nombre');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoActualizar');
    }

    public function activarArea($id)
    {
        $record = Area::find($id);
        $record->update([
            'activo' => true
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoActivar');
    }

    public function inactivarArea($id)
    {
        $record = Area::find($id);
        $record->update([
            'activo' => false
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoInactivar');
    }

    public function modalActivar($id){
        $this->selected_id = $id;
        $this->activar = true;
        $this->OpenModalActivarInactivar();
    }

    public function modalInactivar($id){
        $this->selected_id = $id;
        $this->activar = false;
        $this->OpenModalActivarInactivar();
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset('nombre');
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
