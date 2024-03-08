<?php
// app/Models/Puntuacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos

    protected $table = 'puntuaciones';

    // Clave primaria de la tabla

    protected $primaryKey = 'idPuntuacion';

    // Lista de campos que se pueden llenar masivamente

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
