<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $imagen_encabezado, $titulo, $subtitulo, $id_categoria, $descripcion, $crear_blog;

    public $isOpen, $isOpenModalActivarInactivar, $activar;
    public $activos = true;

    public $paginador = 10;

    protected $messages = [
        'imagen_encabezado.image' => 'Solo se deben cargar imágenes.',
        'titulo.required' => 'Este campo no puede estar vacio.',
        'subtitulo.required' => 'Este campo no puede estar vacio.',
        'descripcion.required' => 'Este campo no puede estar vacio.',
        'id_categoria.required' => 'Este campo no puede estar vacio.'
    ];

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $blogs = Blog::where('activo', $this->activos)->where(
            fn ($query) =>
            $query->where('titulo', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
        )->orderBy('id','asc');

        $categorias = Categoria::where('activo', true)->get();

        $total = $blogs->count();

        if ($this->activos) {
            return view('livewire.blogs.viewActivos', [
                'blogs' => $blogs->paginate($this->paginador),
                'total' => $total,
                'categorias' => $categorias
            ]);
        } else {
            return view('livewire.blogs.viewInactivos', [
                'blogsInactivos' => $blogs->paginate($this->paginador),
                'total' => $total,
                'categorias' => $categorias
            ]);
        }
    }

    public function store()
    {

        $this->validate([
            'imagen_encabezado' => 'required',
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required'
        ]);

        $blog = Blog::create([
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'descripcion' => $this->descripcion,
            'id_categoria' => $this->id_categoria,
            'activo' => true
        ]);

        $id_blog = $blog->id;

        // Genera un nombre de archivo único
        $filename = $id_blog . '.' . $this->imagen_encabezado->getClientOriginalExtension();

        // Almacena la imagen en la carpeta "fotos_blog" de la ruta de almacenamiento
        $ruta_imagen = $this->imagen_encabezado->storeAs('fotos_blog', $filename, 'public');

        $data = [];
        $data['imagen_encabezado'] = $ruta_imagen;

        Blog::whereId($id_blog)->update($data);

        $this->reset('imagen_encabezado', 'titulo', 'subtitulo', 'descripcion', 'id_categoria');
        $this->closeModal();
        $this->resetValidation();
        $this->dispatch('eventoCrear');
    }

    public function edit($id)
    {
        $record = Blog::findOrFail($id);

        $this->selected_id = $id;
        $this->imagen_encabezado = $record->imagen_encabezado;
        $this->subtitulo = $record->subtitulo;
        $this->titulo = $record->titulo;
        $this->descripcion = $record->descripcion;
        $this->id_categoria = $record->id_categoria;

        $this->openModal();
    }

    public function update()
    {
        if ($this->selected_id) {
            $record = Blog::find($this->selected_id);
            if ($this->imagen_encabezado != $record->imagen_encabezado) {

                $this->validate([
                    'imagen_encabezado' => 'required',
                    'titulo' => 'required',
                    'subtitulo' => 'required',
                    'descripcion' => 'required',
                    'id_categoria' => 'required'
                ]);

                // Genera un nombre de archivo único
                $filename = $this->selected_id . '.' . $this->imagen_encabezado->getClientOriginalExtension();

                // Almacena la imagen en la carpeta "fotos_blog" de la ruta de almacenamiento
                $ruta_imagen = $this->imagen_encabezado->storeAs('fotos_blog', $filename, 'public');

                $record->update([
                    'titulo' => $this->titulo,
                    'subtitulo' => $this->subtitulo,
                    'descripcion' => $this->descripcion,
                    'id_categoria' => $this->id_categoria,
                    'imagen_encabezado' => $ruta_imagen
                ]);
            } else {
                $this->validate([
                    'titulo' => 'required',
                    'subtitulo' => 'required',
                    'descripcion' => 'required',
                    'id_categoria' => 'required'
                ]);

                $record->update([
                    'titulo' => $this->titulo,
                    'subtitulo' => $this->subtitulo,
                    'descripcion' => $this->descripcion,
                    'id_categoria' => $this->id_categoria,
                ]);
            }

            $this->reset('imagen_encabezado', 'titulo', 'subtitulo', 'descripcion', 'id_categoria');
            $this->closeModal();
            $this->resetValidation();
            $this->dispatch('eventoActualizar');
        }
    }

    public function activarBlog($id)
    {
        $record = Blog::find($id);
        $record->update([
            'activo' => true
        ]);

        $this->closeModalActivarInactivar();
        $this->dispatch('eventoActivar');
    }

    public function inactivarBlog($id)
    {
        $record = Blog::find($id);
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
        $this->crear_blog = true;
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->selected_id = null;
        $this->reset('imagen_encabezado', 'titulo', 'subtitulo', 'descripcion', 'id_categoria');
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
