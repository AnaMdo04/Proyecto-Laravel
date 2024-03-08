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
        // Crea la tabla intermedia 'eventos_juegos'

        Schema::create('eventos_juegos', function (Blueprint $table) {
            $table->id(); // Define un campo de identificación automática
            // Agrega los campos necesarios para la relación muchos a muchos entre 'eventos' y 'juegos'
            $table->unsignedBigInteger('idEvento'); // Define un campo de tipo entero sin signo para el ID del evento
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'

            // Define claves foráneas para mantener la integridad referencial

            $table->foreign('idEvento')->references('idEvento')->on('eventos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla intermedia 'eventos_juegos'

        Schema::dropIfExists('eventos_juegos');
    }
};
