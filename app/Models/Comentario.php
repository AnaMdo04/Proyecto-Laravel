<?php
// app/Models/Comentario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Añade esta línea
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory; // Usa el trait HasFactory

    protected $table = 'comentarios';
    protected $primaryKey = 'idComentario';
    protected $fillable = ['contenido', 'titulo', 'id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
