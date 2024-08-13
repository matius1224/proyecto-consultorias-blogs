<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Categoria;
use App\Models\ComentarioXBlog;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BlogDashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $detalleBlog = false, $idBlog, $url, $nombre_usuario, $comentario, $id_categoria;
    public function render()
    {
        $comentarios_x_blog = DB::table('comentarios_x_blog as cb')
        ->select('cb.comentario', 'cb.nombre_usuario', 'cb.created_at', 'b.id')
        ->join('blog as b', 'cb.id_blog', '=', 'b.id')
        ->where('b.id',$this->idBlog)
        ->where('cb.activo', true);

        $categoria_asignada = Blog::where('id',$this->idBlog)->pluck('id_categoria')->first();
        $categorias_relacionadas_X_blog = Blog::where('id_categoria',$categoria_asignada)->get();

        if($this->id_categoria > 0){
            $blogs = Blog::where('activo', true)->where('id_categoria',$this->id_categoria)
            ->orderBy('id','asc');
        }else{
            $blogs = Blog::where('activo', true)->orderBy('id','asc');
        }

        $categorias = Categoria::where('activo', true)->get();

        if ($this->detalleBlog) {
            return view('livewire.blog-dashboard.detalleBlog',[
                'comentarios' => $comentarios_x_blog->paginate(8),
                'categorias_relacionadas' => $categorias_relacionadas_X_blog
            ]);
        } else {
            return view('livewire.blog-dashboard.view', [
                'blogs' => $blogs->paginate(6),
                'categorias' => $categorias
            ]);
        }
    }

    public function irADetalleBlog($id)
    {
        $this->resetPage();
        $this->detalleBlog = true;
        $this->idBlog = $id;
        $this->url = route('detalle', $id);
    }

    public function volverABlog()
    {
        $this->detalleBlog = false;
    }

    public function comentarBlog()
    {
        $this->validate([
            'nombre_usuario' => 'required',
            'comentario' => 'required'
        ]);

        ComentarioXBlog::create([
            'id_blog' => $this->idBlog,
            'nombre_usuario' => $this->nombre_usuario,
            'comentario' => $this->comentario
        ]);

        $this->reset('nombre_usuario', 'comentario');
        $this->resetValidation();
        $this->dispatch('eventoComentar');
    }
}
