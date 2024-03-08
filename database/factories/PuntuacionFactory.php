<?php
// database/factories/PuntuacionFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PuntuacionFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'puntuacion' => $this->faker->numberBetween(1, 10), // Genera una puntuación aleatoria entre 1 y 10
            'fecha' => $this->faker->dateTimeBetween('-1 years', 'now'), // Genera una fecha aleatoria en el último año
            'id' => \App\Models\User::factory(), // Genera una instancia de usuario para la relación
            'idJuego' => \App\Models\Juego::factory(), // Genera una instancia de juego para la relación
        ];
    }
}
