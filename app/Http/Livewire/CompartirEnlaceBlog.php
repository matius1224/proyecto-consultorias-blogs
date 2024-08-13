<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\ComentarioXBlog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CompartirEnlaceBlog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_blog, $nombre_usuario, $comentario, $url;

    public function render()
    {
        $comentarios_x_blog = DB::table('comentarios_x_blog as cb')
        ->select('cb.comentario', 'cb.nombre_usuario', 'cb.created_at', 'b.id')
        ->join('blog as b', 'cb.id_blog', '=', 'b.id')
        ->where('b.id',$this->id_blog);

        $categoria_asignada = Blog::where('id',$this->id_blog)->pluck('id_categoria')->first();
        $categorias_relacionadas_X_blog = Blog::where('id_categoria',$categoria_asignada)->get();

        $this->url = route('detalle', $this->id_blog);

        return view('livewire.compartir-enlace-blog.view',[
            'comentarios' => $comentarios_x_blog->paginate(8),
            'categorias_relacionadas' => $categorias_relacionadas_X_blog
        ]);
    }

    public function comentarBlog(){
        $this->validate([
            'nombre_usuario' => 'required',
            'comentario' => 'required'
        ]);

        ComentarioXBlog::create([
            'id_blog' => $this->id_blog,
            'nombre_usuario' => $this->nombre_usuario,
            'comentario' => $this->comentario,
        ]);

        $this->reset('nombre_usuario', 'comentario');
        $this->resetValidation();
        $this->dispatch('eventoComentar');
    }
}
