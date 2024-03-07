<?php
// database/factories/PuntuacionFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PuntuacionFactory extends Factory
{
    public function definition()
    {
        return [
            'puntuacion' => $this->faker->numberBetween(1, 10),
            'fecha' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'id' => \App\Models\User::factory(),
            'idJuego' => \App\Models\Juego::factory(),
        ];
    }
}
