<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos_Juegos extends Model
{
    use HasFactory;

    protected $table = 'pedidos_juegos'; // Nombre de la tabla en la base de datos

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'idPedido',
        'idJuego',
        'cantidad'
    ];

    /**
     * Define la relación con el modelo Pedido.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido'); // Un pedido_juego pertenece a un pedido
    }

    /**
     * Define la relación con el modelo Juego.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'idJuego'); // Un pedido_juego pertenece a un juego
    }
}
