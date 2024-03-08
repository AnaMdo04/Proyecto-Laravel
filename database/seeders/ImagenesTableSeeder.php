<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imagen;

class ImagenesTableSeeder extends Seeder
{
    public function run()
    {
        // Crea 10 imágenes asociadas aleatoriamente a juegos existentes
        Imagen::factory(10)->create();
    }
}
