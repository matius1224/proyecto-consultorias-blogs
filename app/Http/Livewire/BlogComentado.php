<?php

namespace App\Http\Livewire;

use App\Models\ComentarioXBlog;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class BlogComentado extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $keyWordComentarioBlog, $isOpenModalActivarInactivar, $activar, $selected_id;
    public $activos = true;
    public $paginador = 10;
    public function render()
    {
        $keyWordComentarioBlog = '%' . $this->keyWordComentarioBlog . '%';

        $blogXcomentarios = DB::table('comentarios_x_blog as cxb')
        ->join('blog as b','cxb.id_blog','=','b.id')
        ->select(
            'b.id as blog_id',
            'b.titulo as titulo',
            'cxb.id as comentario_id',
            'cxb.nombre_usuario as nombre_usuario',
            'cxb.comentario as comentario'
            )
        ->where('cxb.activo', $this->activos)
        ->where(fn ($query) =>
            $query->where('b.titulo', 'LIKE', $keyWordComentarioBlog)
        );

        $totalBlogXcomentario = $blogXcomentarios->count();

        if ($this->activos) {
            return view('livewire.blog-comentado.viewActivos', [
                'blogXcomentarios' => $blogXcomentarios->paginate($this->paginador),
                'totalBlogXcomentario' => $totalBlogXcomentario
            ]);
        } else {
            return view('livewire.blog-comentado.viewInactivos', [
                'blogXcomentariosInactivos' => $blogXcomentarios->paginate($this->paginador),
                'totalBlogXcomentario' => $totalBlogXcomentario
            ]);
        }
    }

    public function inactivarComentarioBlog($id)
    {
        $record = ComentarioXBlog::find($id);
        $record->update([
            'activo' => false
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoInactivar');
    }

    public function activarComentarioBlog($id)
    {
        $record = ComentarioXBlog::find($id);
        $record->update([
            'activo' => true
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoActivar');
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
