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
        // Crea la tabla 'pedidos'

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('idPedido'); // Define un campo de identificación llamado 'idPedido'
            $table->timestamp('fecha_pedido')->nullable()->useCurrent(); // Define un campo de marca de tiempo para la fecha de pedido, utilizando el valor actual por defecto (puede ser nulo)
            $table->enum('estado', ['pendiente', 'enviado', 'entregado'])->nullable(); // Define un campo enumerado para el estado del pedido, que solo puede tener los valores 'pendiente', 'enviado' o 'entregado' (puede ser nulo)
            $table->unsignedBigInteger('id'); // Define un campo de tipo entero sin signo para el ID del usuario asociado al pedido
            $table->foreign('id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action'); // Establece una clave foránea que hace referencia al ID del usuario en la tabla 'users' con restricción de no acción en actualización y eliminación
            $table->timestamps(); // Crea automáticamente campos para las marcas de tiempo 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     * Revierte las migraciones.
     */

    public function down(): void
    {
        // Elimina la tabla 'pedidos'

        Schema::dropIfExists('pedidos');
    }
};
