<?php
// app/Models/Evento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Añade esta línea
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory; // Usa el trait HasFactory

    protected $table = 'eventos';
    protected $primaryKey = 'idEvento';
    protected $fillable = ['nombre', 'descripcion', 'fecha', 'ubicacion'];
}
