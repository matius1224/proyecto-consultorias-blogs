<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioXBlog extends Model
{
    use HasFactory;

    protected $table = 'comentarios_x_blog';

    protected $fillable = ['id_blog','nombre_usuario','comentario','activo'];
}
