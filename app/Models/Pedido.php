<?php
// app/Models/Pedido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Definición de la tabla correspondiente a este modelo

    protected $table = 'pedidos';

    // Definición de la clave primaria de la tabla

    protected $primaryKey = 'idPedido';

    // Definición de los campos que pueden ser llenados masivamente

    protected $fillable = ['fecha_pedido', 'estado', 'id'];

    // Relación "belongsTo" con el modelo User, indicando la clave foránea

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Relación "belongsToMany" con el modelo Juego, indicando las claves foráneas y el pivot

    public function juegos()
    {
        return $this->belongsToMany(Juego::class, 'pedidos_juegos', 'idPedido', 'idJuego')->withPivot('cantidad');
    }
}
