<?php
// database/factories/FabricanteFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FabricanteFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'pais' => $this->faker->country,
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
