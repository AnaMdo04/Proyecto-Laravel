<?php
// database/factories/CategoriaFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'fecha_creacion' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
