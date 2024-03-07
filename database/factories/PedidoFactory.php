<?php
// database/factories/PedidoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    public function definition()
    {
        $estados = ['pendiente', 'enviado', 'entregado']; // Ajusta según tus estados disponibles

        return [
            'fecha_pedido' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'estado' => $this->faker->randomElement($estados),
            'id' => \App\Models\User::factory(), // Asume que tienes un userFactory
        ];
    }
}
