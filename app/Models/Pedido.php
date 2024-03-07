<?php
// app/Models/Pedido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Añade esta línea
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory; // Usa el trait HasFactory

    protected $table = 'pedidos';
    protected $primaryKey = 'idPedido';
    protected $fillable = ['fecha_pedido', 'estado', 'id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function juegos()
    {
        return $this->belongsToMany(Juego::class, 'pedidos_juegos', 'idPedido', 'idJuego')->withPivot('cantidad');
    }
}
