<?php
// database/seeders/EventoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Evento::factory(5)->create();
    }
}


\App\Models\Evento::all()->each(function ($evento) {
    $juegos = \App\Models\Juego::inRandomOrder()->take(rand(1, 5))->pluck('id');
    $evento->juegos()->attach($juegos);
});
