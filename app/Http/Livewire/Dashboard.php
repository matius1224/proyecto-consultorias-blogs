<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\ComentarioXBlog;
use App\Models\Resena;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $detalleBlog = false, $idBlog, $url, $nombre_usuario, $email_usuario, $comentario, $calificacion = 5, $foto_usuario, $nombre_completo_usuario,
        $comentario_usuario;

    public function render()
    {
        $blogs = Blog::where('activo', true)->orderBy('id', 'asc')->get();
        $resenas = Resena::where('activo',true)->orderBy('id', 'asc')->get();

        if ($this->detalleBlog) {
            return view('livewire.dashboard.detalleBlog');
        } else {
            return view('livewire.dashboard.view', [
                'blogs' => $blogs,
                'resenas' => $resenas
            ]);
        }
    }

    public function irADetalleBlog($id)
    {
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
            'comentario' => $this->comentario,
            'activo' => true,
        ]);

        redirect()->to('/#blog');
        $this->reset('nombre_usuario', 'comentario');
        $this->resetValidation();
        $this->dispatch('eventoComentar');
    }

    public function calificado()
    {
        $this->validate([
            'nombre_completo_usuario' => 'required',
            'comentario_usuario' => 'required',
            'calificacion' => 'required'
        ]);

        $resena = Resena::create([
            'foto_usuario' => null,
            'nombre_completo_usuario' => $this->nombre_completo_usuario,
            'comentario_usuario' => $this->comentario_usuario,
            'calificacion' => $this->calificacion,
            'activo' => true
        ]);

        $id_resena = $resena->id;

        if ($this->foto_usuario != null) {
            // Genera un nombre de archivo único
            $filename = $id_resena . '.' . $this->foto_usuario->getClientOriginalExtension();

            // Almacena la imagen en la carpeta "fotos_blog" de la ruta de almacenamiento
            $ruta_imagen = $this->foto_usuario->storeAs('fotos_usuarios_resena', $filename, 'public');

            $data = [];
            $data['foto_usuario'] = $ruta_imagen;

            Resena::whereId($id_resena)->update($data);
        }

        $this->reset('nombre_completo_usuario', 'comentario_usuario', 'calificacion');
        $this->resetValidation();
        $this->dispatch('eventoCalificar');
    }
}
