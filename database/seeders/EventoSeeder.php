<?php
// database/seeders/EventoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Crea 5 eventos ficticios utilizando el factory de Evento

        \App\Models\Evento::factory(5)->create();

        // Obtiene todos los eventos y, para cada uno, relaciona juegos aleatorios

        \App\Models\Evento::all()->each(function ($evento) {

            // Obtiene juegos aleatorios y los asocia al evento

            $juegos = \App\Models\Juego::inRandomOrder()->take(rand(1, 5))->pluck('idJuego');
            $evento->juegos()->attach($juegos);
        });
    }
}
