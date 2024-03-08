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
            $table->unsignedBigInteger('idJuego'); // Asegura que este nombre de columna coincida con la clave primaria de 'juegos'.
            $table->string('ruta_imagen');
            $table->timestamps();

            // Establece la relación de clave foránea.
            $table->foreign('idJuego')->references('idJuego')->on('juegos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
