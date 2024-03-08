<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'ruta_imagen', // Campo para almacenar la ruta de la imagen
        'idJuego' // Clave foránea para la relación con el modelo Juego
    ];

    // Definición de la relación de pertenencia a un juego

    public function juego()
    {
        return $this->belongsTo(Juego::class); // Una imagen pertenece a un juego
    }
}
