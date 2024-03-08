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
        // Crea la tabla 'juegos'

        Schema::create('juegos', function (Blueprint $table) {
            $table->id('idJuego'); // Define un campo de identificación llamado 'idJuego'
            $table->string('nombre', 45)->nullable(); // Define un campo de texto para el nombre del juego con una longitud máxima de 45 caracteres (puede ser nulo)
            $table->text('descripcion')->nullable(); // Define un campo de texto para la descripción del juego (puede ser nulo)
            $table->integer('edad_minima')->nullable(); // Define un campo de tipo entero para la edad mínima requerida para jugar al juego (puede ser nulo)
            $table->decimal('precio', 10, 2)->nullable(); // Define un campo de tipo decimal para el precio del juego (puede ser nulo)
            $table->integer('stock')->nullable(); // Define un campo de tipo entero para el stock del juego (puede ser nulo)
            $table->unsignedBigInteger('idFabricante'); // Define un campo de tipo entero sin signo para el ID del fabricante
            $table->foreign('idFabricante')->references('idFabricante')->on('fabricantes')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del fabricante en la tabla 'fabricantes' con restricción de no acción en actualización y eliminación
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'juegos'

        Schema::dropIfExists('juegos');
    }
};
