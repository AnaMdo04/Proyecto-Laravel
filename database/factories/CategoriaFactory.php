<?php
// database/factories/CategoriaFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'nombre' => $this->faker->word, // Genera un nombre de categoría aleatorio
            'descripcion' => $this->faker->sentence, // Genera una descripción aleatoria
            'fecha_creacion' => $this->faker->dateTimeBetween('-2 years', 'now'), // Genera una fecha de creación aleatoria en los últimos 2 años
        ];
    }
}
