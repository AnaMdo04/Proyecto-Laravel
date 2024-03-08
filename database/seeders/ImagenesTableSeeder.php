<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imagen;

class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ejecuta los seeders de la base de datos.
     */

    public function run()
    {
        // Utiliza el factory de Laravel para crear 10 registros en la tabla 'imagenes'

        Imagen::factory(10)->create();
    }
}
