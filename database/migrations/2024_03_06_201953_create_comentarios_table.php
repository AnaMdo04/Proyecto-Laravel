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
        // Crea la tabla 'comentarios'

        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('idComentario'); // Define un campo de identificación llamado 'idComentario'
            $table->text('contenido'); // Define un campo de texto para el contenido del comentario
            $table->dateTime('fecha'); // Define un campo de tipo fecha y hora para la fecha del comentario
            $table->string('titulo'); // Define un campo de tipo cadena para el título del comentario
            $table->unsignedBigInteger('id'); // Define un campo de tipo entero sin signo para el ID del usuario que realizó el comentario
            $table->unsignedBigInteger('idJuego'); // Define un campo de tipo entero sin signo para el ID del juego al que pertenece el comentario
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'

            // Define claves foráneas para mantener la integridad referencial y realizar acciones en cascada en eliminación

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'comentarios'

        Schema::dropIfExists('comentarios');
    }
};
