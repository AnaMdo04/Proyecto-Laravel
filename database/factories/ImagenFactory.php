<?php

namespace Database\Factories;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenFactory extends Factory
{
    protected $model = Imagen::class;

    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'idJuego' => \App\Models\Juego::factory(), // Genera una instancia de juego para la relación
            'ruta_imagen' => $this->faker->imageUrl(640, 480, 'juegos'), // Genera una URL de imagen ficticia
        ];
    }
}
