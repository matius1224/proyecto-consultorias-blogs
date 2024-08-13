<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultoriasXusuarios extends Model
{
    use HasFactory;

    protected $table = 'consultorias_x_usuarios';

    protected $fillable = ['nombres','email','whatsapp','empresa','id_area','descripcion_consultoria'];
}
