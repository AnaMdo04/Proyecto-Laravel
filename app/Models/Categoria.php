<?php
// app/Models/Categoria.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'idCategoria';
    protected $fillable = ['nombre', 'descripcion'];

    public function juegos()
    {
        return $this->belongsToMany(Juego::class, 'juegos_categorias', 'idCategoria', 'idJuego');
    }
}
