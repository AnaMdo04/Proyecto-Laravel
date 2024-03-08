<?php
// app/Models/Categoria.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idCategoria'; // Nombre de la clave primaria en la tabla
    protected $fillable = ['nombre', 'descripcion']; // Columnas que se pueden llenar masivamente

    /**
     * Define la relación muchos a muchos con el modelo Juego.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function juegos()
    {
        return $this->belongsToMany(Juego::class, 'juegos_categorias', 'idCategoria', 'idJuego');

        // Define la relación muchos a muchos con el modelo Juego a través de la tabla intermedia 'juegos_categorias'
        // 'idCategoria' y 'idJuego' son los nombres de las claves externas en la tabla intermedia
    }
}
