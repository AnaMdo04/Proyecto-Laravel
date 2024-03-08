<?php
// database/seeders/EventoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run()
    {
        // Crear 5 eventos utilizando el factory

        \App\Models\Evento::factory(5)->create();
    }
}

// Asignar juegos aleatorios a cada evento
// Obtener todos los eventos y para cada uno, asignar de 1 a 5 juegos aleatorios

\App\Models\Evento::all()->each(function ($evento) {

    // Obtener de forma aleatoria entre 1 y 5 juegos y obtener sus IDs

    $juegos = \App\Models\Juego::inRandomOrder()->take(rand(1, 5))->pluck('id');

    // Asignar los juegos obtenidos al evento actual

    $evento->juegos()->attach($juegos);
});
