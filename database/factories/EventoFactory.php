<?php
// database/factories/EventoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3), // Genera un nombre de evento aleatorio
            'descripcion' => $this->faker->text, // Genera una descripción de evento aleatoria
            'fecha' => $this->faker->date, // Genera una fecha aleatoria
            'ubicacion' => $this->faker->address, // Genera una ubicación aleatoria
        ];
    }
}
