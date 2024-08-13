<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Consultorias extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginador = 10, $keyWord;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $consultorias = DB::table('consultorias_x_usuarios as c')
        ->join('areas as a','c.id_area','=','a.id')
        ->where(fn ($query) =>
            $query->where('a.nombre', 'LIKE', $keyWord)
            ->orWhere('c.nombres', 'LIKE', $keyWord)
        );

        $total = $consultorias->count();
       
        return view('livewire.consultorias.view', [
            'consultorias' => $consultorias->paginate($this->paginador),
            'total' => $total,
        ]);
        
    }

}
