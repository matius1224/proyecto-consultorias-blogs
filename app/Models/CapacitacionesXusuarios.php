<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacitacionesXusuarios extends Model
{
    use HasFactory;

    protected $table = 'capacitaciones_x_usuarios';

    protected $fillable = ['id_capacitacion','nombres_usuario','apellidos_usuario','whatsapp','correo_usuario','empresa_usuario','cargo_usuario'];
}
