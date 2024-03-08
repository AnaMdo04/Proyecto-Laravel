<?php
// database/seeders/CategoriaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Utiliza el factory de Laravel para crear 10 registros en la tabla 'categorias'

        \App\Models\Categoria::factory(10)->create();
    }
}
