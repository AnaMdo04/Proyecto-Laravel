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
        // Crea la tabla intermedia 'juegos_categorias'

        Schema::create('juegos_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego
            $table->unsignedBigInteger('idCategoria'); // Define un campo de tipo entero sin signo para el ID de la categoría
            $table->primary(['idJuego', 'idCategoria']); // Establece una clave primaria compuesta por los campos 'idJuego' y 'idCategoria'
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade'); // Establece una clave foránea que hace referencia al ID del juego en la tabla 'juegos' con acción en cascada en eliminación
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias')->onDelete('cascade'); // Establece una clave foránea que hace referencia al ID de la categoría en la tabla 'categorias' con acción en cascada en eliminación
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla intermedia 'juegos_categorias'

        Schema::dropIfExists('juegos_categorias');
    }
};
