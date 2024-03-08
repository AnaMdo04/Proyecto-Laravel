<?php
// app/Models/Fabricante.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $table = 'fabricantes';
    protected $primaryKey = 'idFabricante';
    protected $fillable = ['nombre', 'pais', 'descripcion'];

    public function juegos()
    {
        return $this->hasMany(Juego::class, 'idFabricante');
    }
}
