<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $table = 'fabricantes'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idFabricante'; // Nombre de la clave primaria

    protected $fillable = ['nombre', 'pais', 'descripcion']; // Columnas que se pueden asignar en masa

    // Definición de la relación uno a muchos con el modelo Juego

    public function juegos()
    {
        return $this->hasMany(Juego::class, 'idFabricante'); // Un fabricante puede tener muchos juegos
    }
}
