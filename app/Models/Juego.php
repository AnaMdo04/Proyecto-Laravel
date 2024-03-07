<?php
// app/Models/Juego.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory; // Utiliza el trait HasFactory dentro de la clase

    protected $table = 'juegos';
    protected $primaryKey = 'idJuego';

    protected $fillable = [
        'nombre',
        'descripcion',
        'edad_minima',
        'precio',
        'stock',
        'idFabricante'
    ];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'idFabricante');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'idJuego');
    }

    public function puntuaciones()
    {
        return $this->hasMany(Puntuacion::class, 'idJuego');
    }

    // La relación con categorías a través de una tabla pivot no necesita un modelo dedicado.
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'juegos_categorias', 'idJuego', 'idCategoria');
    }
}
