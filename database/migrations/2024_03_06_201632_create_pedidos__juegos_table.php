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
        Schema::create('pedidos_juegos', function (Blueprint $table) {
            $table->unsignedBigInteger('idPedido');
            $table->unsignedBigInteger('idJuego');
            $table->integer('cantidad');
            $table->primary(['idPedido', 'idJuego']);
            $table->foreign('idPedido')->references('idPedido')->on('pedidos')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos__juegos');
    }
};
