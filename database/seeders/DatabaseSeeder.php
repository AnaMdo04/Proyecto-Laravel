<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
