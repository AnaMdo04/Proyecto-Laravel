<?php
// database/seeders/ComentarioSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Juego;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        $user = User::all()->pluck('id');
        $juegos = Juego::all()->pluck('idJuego');

        if ($user->isEmpty() || $juegos->isEmpty()) {
            return; // No hay users o juegos, así que no se pueden crear comentarios.
        }

        Comentario::factory(50)->make()->each(function ($comentario) use ($user, $juegos) {
            // Asigna un iduser e idJuego aleatorio de los disponibles
            $comentario->id = $user->random();
            $comentario->idJuego = $juegos->random();
            $comentario->save();
        });
    }
}
