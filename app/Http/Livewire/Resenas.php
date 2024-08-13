<?php

namespace App\Http\Livewire;

use App\Models\Resena;
use Livewire\Component;
use Livewire\WithPagination;

class Resenas extends Component
{
    use WithPagination;
    public $keyWord,$paginador = 10,$selected_id,$isOpenModalActivarInactivar;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $resenas = Resena::where('activo',true)->where(
            fn ($query) =>
            $query->where('comentario_usuario', 'LIKE', $keyWord)
        )->orderBy('id','asc');

        return view('livewire.resenas.view',[
            'resenas' => $resenas->paginate($this->paginador),
            'total' => $resenas->count()
        ]);
    }

    public function inactivarResena($id)
    {
        $record = Resena::find($id);
        $record->update([
            'activo' => false
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoInactivar');
    }

    public function modalInactivar($id)
    {
        $this->selected_id = $id;
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
