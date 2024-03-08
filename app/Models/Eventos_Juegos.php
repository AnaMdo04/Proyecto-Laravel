<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_Juegos extends Model
{
    use HasFactory;

    protected $table = 'eventos_juegos'; // Nombre de la tabla en la base de datos

    // No es necesario especificar la clave primaria ni las columnas fillable ya que este modelo no tiene atributos propios, solo representa la relación entre otros modelos

    // No hay métodos adicionales definidos aquí, ya que este modelo solo representa la relación muchos a muchos entre Evento y Juego
}
