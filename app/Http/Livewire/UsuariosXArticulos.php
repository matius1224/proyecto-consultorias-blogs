<?php

namespace App\Http\Livewire;

use App\Models\UsuarioXDescargaArticuloRecurso;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosXArticulos extends Component
{
    use WithPagination;
    public $keyWord,$paginador = 10;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $usuariosXArticulos = UsuarioXDescargaArticuloRecurso::whereNotNull('id_articulo')->where(
            fn ($query) =>
            $query->where('nombres_usuario', 'LIKE', $keyWord)
                ->orWhere('apellidos_usuario', 'LIKE', $keyWord)
                ->orWhere('celular_usuario', 'LIKE', $keyWord)
                ->orWhere('correo_usuario', 'LIKE', $keyWord)
                ->orWhere('empresa_usuario', 'LIKE', $keyWord)
                ->orWhere('cargo_usuario', 'LIKE', $keyWord)
        )->orderBy('id','asc');

        return view('livewire.listado-usuarios-articulos.view',[
            'usuariosXArticulos' => $usuariosXArticulos->paginate($this->paginador),
            'total' => $usuariosXArticulos->count()
        ]);
    }
}
