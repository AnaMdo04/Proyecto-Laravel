<?php
// database/seeders/FabricanteSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FabricanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Utiliza el factory de Laravel para crear 5 registros en la tabla 'fabricantes'

        \App\Models\Fabricante::factory(5)->create();
    }
}
