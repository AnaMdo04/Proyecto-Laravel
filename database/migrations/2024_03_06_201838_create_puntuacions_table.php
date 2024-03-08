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
        // Crea la tabla 'puntuaciones'

        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->id('idPuntuacion'); // Define un campo de identificación llamado 'idPuntuacion'
            $table->integer('puntuacion')->nullable(); // Define un campo de tipo entero para la puntuación (puede ser nulo)
            $table->timestamp('fecha')->nullable()->useCurrent(); // Define un campo de marca de tiempo para la fecha de la puntuación, utilizando el valor actual por defecto (puede ser nulo)
            $table->unsignedBigInteger('id'); // Define un campo de tipo entero sin signo para el ID del usuario asociado a la puntuación
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego asociado a la puntuación
            $table->foreign('id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del usuario en la tabla 'users' con restricción de no acción en actualización y eliminación
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del juego en la tabla 'juegos' con restricción de no acción en actualización y eliminación
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'puntuaciones'

        Schema::dropIfExists('puntuaciones');
    }
};
