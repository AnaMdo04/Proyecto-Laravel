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
        // Crea la tabla 'fabricantes'

        Schema::create('fabricantes', function (Blueprint $table) {
            $table->id('idFabricante'); // Define un campo de identificación llamado 'idFabricante'
            $table->string('nombre', 45)->nullable(); // Define un campo de texto para el nombre del fabricante con una longitud máxima de 45 caracteres (puede ser nulo)
            $table->string('pais', 255)->nullable(); // Define un campo de texto para el país del fabricante con una longitud máxima de 255 caracteres (puede ser nulo)
            $table->text('descripcion')->nullable(); // Define un campo de texto para la descripción del fabricante (puede ser nulo)
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'fabricantes'

        Schema::dropIfExists('fabricantes');
    }
};
