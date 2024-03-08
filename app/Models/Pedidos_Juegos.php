<?php
// app/Models/Puntuacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;

    // Definición de la tabla correspondiente a este modelo

    protected $table = 'puntuaciones';

    // Definición de la clave primaria de la tabla

    protected $primaryKey = 'idPuntuacion';

    // Definición de los campos que pueden ser llenados masivamente

    protected $fillable = ['puntuacion', 'id', 'idJuego'];

    // Relación "belongsTo" con el modelo User, indicando la clave foránea

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación "belongsTo" con el modelo Juego, indicando la clave foránea

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'idJuego');
    }
}
