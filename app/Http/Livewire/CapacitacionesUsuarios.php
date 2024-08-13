<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\CapacitacionesXusuarios;
use App\Models\Capacitacion;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

class CapacitacionesUsuarios extends Component
{
    use WithFileUploads;

    public $keyWordUsuarios;
    public function render()
    {
        $keyWordUsuarios = '%' . $this->keyWordUsuarios . '%';

        $capacitacionesXusuarios = DB::table('capacitaciones_x_usuarios as cxu')
        ->join('capacitaciones as c','cxu.id_capacitacion','=','c.id')
        ->select(
            'c.id as capacitacion_id',
            'cxu.id as usuario_id',
            'c.tema as tema',
            'cxu.nombres_usuario as nombres_usuario',
            'cxu.apellidos_usuario as apellidos_usuario',
            'cxu.correo_usuario as correo_usuario',
            'cxu.empresa_usuario as empresa_usuario',
            'cxu.cargo_usuario as cargo_usuario'
            )
        ->where(fn ($query) =>
            $query->where('tema', 'LIKE', $keyWordUsuarios)
            ->orWhere('nombres_usuario', 'LIKE', $keyWordUsuarios)
        );

        $totalcapacitacionesXusuarios = $capacitacionesXusuarios->count();

        return view('livewire.capacitacionesUsuarios.view', [
            'capacitacionesXusuarios' => $capacitacionesXusuarios->paginate(10),
            'totalcapacitacionesXusuarios' => $totalcapacitacionesXusuarios
        ]);
    }

    public function pdf($id)
    {
        $record = CapacitacionesXusuarios::findOrFail($id);
        $record1 = Capacitacion::findOrFail($record->id_capacitacion);

        // Ruta donde deseas guardar el PDF
        $rutaPdf = public_path('storage/pdfs');
        $rutaQr = public_path('storage/qrcodes');

        // Generar el código QR
        $qrCode = QrCode::size(300)->generate('https://coyca.online/storage/pdfs/' . $id . '.pdf');

        // Guardar el código QR generado en un archivo
        file_put_contents($rutaQr . '/' . $id . '.png', $qrCode);


        // Datos para el PDF
        $data = [
            'nombres_usuario' => $record->nombres_usuario,
            'apellidos_usuario' => $record->apellidos_usuario,
            'capacitacion' => $record1->tema,
            'qrCode' => $rutaQr . '/' . $id . '.png',
        ];


        // Cargar la vista PDF
        $pdf = Pdf::loadView('livewire.capacitacionesUsuarios.viewPdf', $data);

        // Guardar el PDF en la ruta especificada
        $pdf->save($rutaPdf . '/' . $id . '.pdf');

        // Descargar el PDF
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'Diploma.pdf');
    }

}
