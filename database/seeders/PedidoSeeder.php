<?php
// database/seeders/PedidoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Utiliza el factory de Pedido para crear 10 registros en la tabla 'pedidos'

        \App\Models\Pedido::factory(10)->create()->each(function ($pedido) {

            // Obtén juegos aleatorios entre 1 y 3

            $juegos = \App\Models\Juego::inRandomOrder()->take(rand(1, 3))->get();

            // Asocia cada juego al pedido con una cantidad aleatoria

            foreach ($juegos as $juego) {
                $pedido->juegos()->attach($juego->idJuego, ['cantidad' => rand(1, 5)]);
            }
        });
    }
}
