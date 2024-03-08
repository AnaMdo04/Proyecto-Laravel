<?php

namespace Database\Factories;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenFactory extends Factory
{
    protected $model = Imagen::class;

    public function definition()
    {
        return [
            'idJuego' => \App\Models\Juego::factory(),
            'ruta_imagen' => $this->faker->imageUrl(640, 480, 'juegos'), // Genera una URL de imagen ficticia
        ];
    }
}
