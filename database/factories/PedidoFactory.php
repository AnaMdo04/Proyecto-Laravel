<?php
// database/factories/PedidoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    // Define la estructura de los datos de la fábrica

    public function definition()
    {
        // Lista de posibles estados de pedido

        $estados = ['pendiente', 'enviado', 'entregado'];

        return [
            'fecha_pedido' => $this->faker->dateTimeBetween('-1 years', 'now'), // Genera una fecha de pedido aleatoria en el último año
            'estado' => $this->faker->randomElement($estados), // Selecciona un estado aleatorio para el pedido
            'id' => \App\Models\User::factory(), // Genera una instancia de usuario para la relación
        ];
    }
}
