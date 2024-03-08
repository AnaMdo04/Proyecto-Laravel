<?php
// database/seeders/JuegoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fabricante;
use App\Models\Juego;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Obtener todos los IDs de fabricantes

        $fabricanteIds = Fabricante::pluck('idFabricante');

        // Utiliza el factory de Juego para crear 10 registros en la tabla 'juegos'

        Juego::factory(10)->create()->each(function ($juego) use ($fabricanteIds) {

            // Asigna un idFabricante aleatorio a cada juego creado

            $juego->idFabricante = $fabricanteIds->random();
            $juego->save(); // Guarda el juego en la base de datos
        });
    }
}
