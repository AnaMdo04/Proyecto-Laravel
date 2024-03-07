<?php
// database/seeders/PedidoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Pedido::factory(10)->create()->each(function ($pedido) {
            $juegos = \App\Models\Juego::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($juegos as $juego) {
                $pedido->juegos()->attach($juego->id, ['cantidad' => rand(1, 5)]);
            }
        });
    }
}
