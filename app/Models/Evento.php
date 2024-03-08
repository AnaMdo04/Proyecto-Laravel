<?php
// app/Models/Evento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idEvento'; // Nombre de la clave primaria en la tabla
    protected $fillable = ['nombre', 'descripcion', 'fecha', 'ubicacion']; // Columnas que se pueden llenar masivamente
}
