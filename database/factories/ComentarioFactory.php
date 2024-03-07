<?php
// database/factories/ComentarioFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    public function definition()
    {
        return [
            'contenido' => $this->faker->paragraph,
            'fecha' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'titulo' => $this->faker->sentence,
            'id' => \App\Models\User::factory(),
            'idJuego' => \App\Models\Juego::factory(),
        ];
    }
}
