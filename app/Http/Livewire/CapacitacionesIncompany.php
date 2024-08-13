<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CapacitacionesIncompany extends Component
{
    public $keyWordUsuariosIncompany;
    public function render()
    {

        $keyWordUsuariosIncompany = '%' . $this->keyWordUsuariosIncompany . '%';

        $capacitacionesIncompanyXusuarios = DB::table('capacitaciones_incompany_x_usuarios as cixu')
        ->join('areas as a','cixu.id_area','=','a.id')
        ->where(fn ($query) =>
            $query->where('a.nombre', 'LIKE', $keyWordUsuariosIncompany)
            ->orWhere('cixu.nombres_usuario_incompany', 'LIKE', $keyWordUsuariosIncompany)
        );
        
        $totalcapacitacionesIncompanyXusuarios = $capacitacionesIncompanyXusuarios->count();

        return view('livewire.capacitacionesIncompany.view', [
            'capacitacionesIncompanyXusuarios' => $capacitacionesIncompanyXusuarios->paginate(10),
            'totalcapacitacionesIncompanyXusuarios' => $totalcapacitacionesIncompanyXusuarios
        ]);
    }
}
