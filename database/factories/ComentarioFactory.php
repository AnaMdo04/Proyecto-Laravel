<?php
// database/factories/ComentarioFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        return [
            'contenido' => $this->faker->paragraph, // Genera un contenido de comentario aleatorio
            'fecha' => $this->faker->dateTimeBetween('-1 years', 'now'), // Genera una fecha aleatoria en el último año
            'titulo' => $this->faker->sentence, // Genera un título de comentario aleatorio
            'id' => \App\Models\User::factory(), // Genera una instancia de usuario para la relación
            'idJuego' => \App\Models\Juego::factory(), // Genera una instancia de juego para la relación
        ];
    }
}
