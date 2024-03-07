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
        Schema::create('juegos_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('idJuego');
            $table->unsignedBigInteger('idCategoria');
            $table->primary(['idJuego', 'idCategoria']);
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos__categorias');
    }
};
