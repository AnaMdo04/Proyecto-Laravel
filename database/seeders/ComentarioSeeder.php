<?php
// database/seeders/ComentarioSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Juego;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Obtén todos los IDs de usuarios y juegos disponibles

        $userIds = User::all()->pluck('id');
        $juegoIds = Juego::all()->pluck('idJuego');

        // Verifica si no hay usuarios o juegos disponibles

        if ($userIds->isEmpty() || $juegoIds->isEmpty()) {
            return; // No hay usuarios o juegos, por lo que no se pueden crear comentarios
        }

        // Crea 50 comentarios ficticios utilizando el factory de Comentario

        Comentario::factory(50)->make()->each(function ($comentario) use ($userIds, $juegoIds) {

            // Asigna un ID de usuario y de juego aleatorio de los disponibles

            $comentario->id = $userIds->random();
            $comentario->idJuego = $juegoIds->random();
            $comentario->save(); // Guarda el comentario en la base de datos
        });
    }
}
