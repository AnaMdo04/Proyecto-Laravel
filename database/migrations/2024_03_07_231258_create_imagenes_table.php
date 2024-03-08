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
        // Crea la tabla 'imagenes'

        Schema::create('imagenes', function (Blueprint $table) {
            $table->id(); // Define un campo de identificación automática
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego asociado a la imagen
            $table->string('ruta_imagen'); // Define un campo de tipo cadena para la ruta de la imagen
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'

            // Define una clave foránea para mantener la integridad referencial y realizar acciones en cascada en eliminación

            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'imagenes'

        Schema::dropIfExists('imagenes');
    }
};
