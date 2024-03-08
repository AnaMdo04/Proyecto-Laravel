<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Utiliza el factory de User para crear 10 registros en la tabla 'users'

        \App\Models\User::factory(10)->create();
    }
}
