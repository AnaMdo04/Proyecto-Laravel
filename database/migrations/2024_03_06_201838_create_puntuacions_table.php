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
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->id('idPuntuacion');
            $table->integer('puntuacion')->nullable();
            $table->timestamp('fecha')->nullable()->useCurrent();
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('idJuego');
            $table->foreign('id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntuaciones');
    }
};
