<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo para la tabla pivot entre juegos y categorías.
 *
 * Se utiliza para gestionar la relación muchos a muchos.
 */

class Juegos_Categorias extends Model
{
    use HasFactory;

    // No se requieren propiedades adicionales si solo se usan claves foráneas.
}
