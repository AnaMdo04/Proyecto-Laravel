<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JuegoFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomFloat(2, 5, 100), // Precio entre 5 y 100
            'edad_minima' => $this->faker->numberBetween(3, 18),
            'stock' => $this->faker->numberBetween(0, 50),
            'idFabricante' => \App\Models\Fabricante::factory(),
        ];
    }
}
