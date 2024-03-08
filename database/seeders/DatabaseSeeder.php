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
            CategoriaSeeder::class, // Asegúrate de agregar este si no lo habías hecho antes
            JuegoSeeder::class,
            EventoSeeder::class,
            PedidoSeeder::class,
            ComentarioSeeder::class,
            PuntuacionSeeder::class,
            ImagenesTableSeeder::class, // Asegúrate de tener este seeder definido si estás trabajando con pedidos
        ]);
    }
}
