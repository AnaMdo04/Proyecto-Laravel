<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Llama a los otros seeders para poblar la base de datos con datos ficticios

        $this->call([
            UserSeeder::class,
            FabricanteSeeder::class,
            CategoriaSeeder::class,
            JuegoSeeder::class,
            EventoSeeder::class,
            PedidoSeeder::class,
            ComentarioSeeder::class,
            PuntuacionSeeder::class,
            ImagenesTableSeeder::class,
        ]);
    }
}
