<?php
// database/factories/FabricanteFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FabricanteFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'nombre' => $this->faker->company, // Genera un nombre de fabricante aleatorio
            'pais' => $this->faker->country, // Genera un país aleatorio
            'descripcion' => $this->faker->paragraph, // Genera una descripción aleatoria
        ];
    }
}
