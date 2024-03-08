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
        // Crea la tabla 'categorias'

        Schema::create('categorias', function (Blueprint $table) {
            $table->id('idCategoria'); // Define un campo de identificación llamado 'idCategoria'
            $table->string('nombre', 45)->nullable(); // Define un campo de texto para el nombre de la categoría con una longitud máxima de 45 caracteres (puede ser nulo)
            $table->text('descripcion')->nullable(); // Define un campo de texto para la descripción de la categoría (puede ser nulo)
            $table->timestamp('fecha_creacion')->nullable()->useCurrent(); // Define un campo de marca de tiempo para la fecha de creación de la categoría, utilizando el valor actual por defecto (puede ser nulo)
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'categorias'

        Schema::dropIfExists('categorias');
    }
};
