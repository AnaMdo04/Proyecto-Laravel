<?php
// app/Models/Juego.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';
    protected $primaryKey = 'idJuego';

    protected $fillable = [
        'nombre',
        'descripcion',
        'edad_minima',
        'precio',
        'stock',
        'idFabricante',
        'ruta_imagen'
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

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'juegos_categorias', 'idJuego', 'idCategoria');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'idJuego');
    }
}
