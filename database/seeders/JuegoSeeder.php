<?php
// database/seeders/JuegoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fabricante;
use App\Models\Juego;

class JuegoSeeder extends Seeder
{
    public function run()
    {
        $fabricanteIds = Fabricante::pluck('idFabricante'); // Obtener todos los IDs de fabricantes

        Juego::factory(10)->create()->each(function ($juego) use ($fabricanteIds) {
            $juego->idFabricante = $fabricanteIds->random(); // Asignar un idFabricante aleatorio
            $juego->save();
        });
    }
}
