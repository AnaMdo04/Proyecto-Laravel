<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJuego');
            $table->string('ruta_imagen');
            $table->timestamps();

            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
