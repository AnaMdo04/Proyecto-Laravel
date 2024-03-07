<?php
// app/Models/Puntuacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Añade esta línea
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory; // Usa el trait HasFactory

    protected $table = 'puntuaciones';
    protected $primaryKey = 'idPuntuacion';
    protected $fillable = ['puntuacion', 'id', 'idJuego'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'idJuego');
    }
}
