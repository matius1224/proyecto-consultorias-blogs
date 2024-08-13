<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'resena';

    protected $fillable = ['foto_usuario','nombre_completo_usuario','comentario_usuario','calificacion','activo'];
}
