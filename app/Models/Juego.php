<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idJuego'; // Clave primaria de la tabla

    protected $fillable = [
        'nombre',
        'descripcion',
        'edad_minima',
        'precio',
        'stock',
        'idFabricante',
        'ruta_imagen'
    ]; // Atributos que se pueden asignar de forma masiva

    // Definición de la relación de pertenencia a un fabricante

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'idFabricante'); // Un juego pertenece a un fabricante
    }

    // Definición de la relación de un juego con sus comentarios

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'idJuego'); // Un juego puede tener muchos comentarios
    }

    // Definición de la relación de un juego con sus puntuaciones

    public function puntuaciones()
    {
        return $this->hasMany(Puntuacion::class, 'idJuego'); // Un juego puede tener muchas puntuaciones
    }

    // Definición de la relación de un juego con sus categorías

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'juegos_categorias', 'idJuego', 'idCategoria'); // Un juego puede pertenecer a varias categorías
    }

    // Definición de la relación de un juego con sus imágenes

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'idJuego'); // Un juego puede tener muchas imágenes asociadas
    }
}
