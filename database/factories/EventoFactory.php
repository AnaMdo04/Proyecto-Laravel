<?php
// database/factories/EventoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->text,
            'fecha' => $this->faker->date,
            'ubicacion' => $this->faker->address,
        ];
    }
}
