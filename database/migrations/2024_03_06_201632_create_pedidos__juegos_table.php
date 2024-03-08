<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Utiliza una clase anónima que extiende la clase Migration

return new class extends Migration
{
    /**
     * Run the migrations.
     * Ejecuta las migraciones.
     */

    public function up(): void
    {
        // Crea la tabla intermedia 'pedidos_juegos'

        Schema::create('pedidos_juegos', function (Blueprint $table) {
            $table->unsignedBigInteger('idPedido'); // Define un campo de tipo entero sin signo para el ID del pedido
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego
            $table->integer('cantidad'); // Define un campo de tipo entero para la cantidad de juegos en el pedido
            $table->primary(['idPedido', 'idJuego']); // Establece una clave primaria compuesta por los campos 'idPedido' y 'idJuego'
            $table->foreign('idPedido')->references('idPedido')->on('pedidos')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del pedido en la tabla 'pedidos' con restricción de no acción en actualización y eliminación
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del juego en la tabla 'juegos' con restricción de no acción en actualización y eliminación
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla intermedia 'pedidos_juegos'

        Schema::dropIfExists('pedidos_juegos');
    }
};
