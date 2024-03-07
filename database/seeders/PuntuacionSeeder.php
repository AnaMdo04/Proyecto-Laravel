<?php
// database/seeders/PuntuacionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Juego;
use App\Models\Puntuacion;

class PuntuacionSeeder extends Seeder
{
    public function run()
    {
        $user = User::all()->pluck('id');
        $juegos = Juego::all()->pluck('idJuego');

        if ($user->isEmpty() || $juegos->isEmpty()) {
            return; // No hay users o juegos, así que no se pueden crear puntuaciones.
        }

        Puntuacion::factory(50)->make()->each(function ($puntuacion) use ($user, $juegos) {
            // Asigna un iduser e idJuego aleatorio de los disponibles
            $puntuacion->id = $user->random();
            $puntuacion->idJuego = $juegos->random();
            $puntuacion->save();
        });
    }
}
