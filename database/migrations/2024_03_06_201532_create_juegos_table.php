<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id('idJuego');
            $table->string('nombre', 45)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('edad_minima')->nullable();
            $table->decimal('precio', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->unsignedBigInteger('idFabricante');
            $table->foreign('idFabricante')->references('idFabricante')->on('fabricantes')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
