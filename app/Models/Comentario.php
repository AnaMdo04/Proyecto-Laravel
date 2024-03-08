<?php
// app/Models/Comentario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idComentario'; // Nombre de la clave primaria en la tabla
    protected $fillable = ['contenido', 'titulo', 'id']; // Columnas que se pueden llenar masivamente

    /**
     * Define la relación de pertenencia a un usuario.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'id');

        // Define la relación de pertenencia a un usuario a través de la clave 'id'
    }
}
