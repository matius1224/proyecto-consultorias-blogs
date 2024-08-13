<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioXDescargaArticuloRecurso extends Model
{
    use HasFactory;

    protected $table = 'usuarios_x_descarga_articulos_recursos';

    protected $fillable = ['id_recurso', 'id_articulo', 'nombres_usuario', 'apellidos_usuario', 'celular_usuario', 'correo_usuario', 'empresa_usuario', 'cargo_usuario'];
}
