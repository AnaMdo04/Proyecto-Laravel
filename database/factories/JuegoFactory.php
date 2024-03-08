<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JuegoFactory extends Factory
{
    // Define el modelo asociado a la fábrica
    protected $model = \App\Models\Juego::class;

    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'nombre' => $this->faker->word, // Genera un nombre de juego aleatorio
            'descripcion' => $this->faker->sentence, // Genera una descripción de juego aleatoria
            'precio' => $this->faker->randomFloat(2, 5, 100), // Genera un precio aleatorio entre 5 y 100
            'edad_minima' => $this->faker->numberBetween(3, 18), // Genera una edad mínima aleatoria entre 3 y 18
            'stock' => $this->faker->numberBetween(0, 50), // Genera un stock aleatorio entre 0 y 50
            'idFabricante' => \App\Models\Fabricante::factory(), // Genera una instancia de fabricante para la relación
        ];
    }
}
