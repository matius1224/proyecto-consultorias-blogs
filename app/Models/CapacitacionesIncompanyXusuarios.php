<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacitacionesIncompanyXusuarios extends Model
{
    use HasFactory;

    protected $table = 'capacitaciones_incompany_x_usuarios';

    protected $fillable = ['nombres_usuario_incompany','email_usuario_incompany','whatsapp_usuario_incompany','empresa_usuario_incompany','id_area','descripcion_usuario_incompany'];
}
