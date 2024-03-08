<?php
// database/seeders/PuntuacionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Juego;
use App\Models\Puntuacion;

class PuntuacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Obtén todos los IDs de usuarios y juegos disponibles

        $userIds = User::pluck('id');
        $juegoIds = Juego::pluck('idJuego');

        // Verifica si no hay usuarios o juegos disponibles

        if ($userIds->isEmpty() || $juegoIds->isEmpty()) {
            return; // No hay usuarios o juegos, por lo que no se pueden crear puntuaciones
        }

        // Crea 50 puntuaciones ficticias utilizando el factory de Puntuacion

        Puntuacion::factory(50)->make()->each(function ($puntuacion) use ($userIds, $juegoIds) {

            // Asigna un ID de usuario y un ID de juego aleatorio de los disponibles

            $puntuacion->id = $userIds->random();
            $puntuacion->idJuego = $juegoIds->random();
            $puntuacion->save(); // Guarda la puntuación en la base de datos
        });
    }
}
