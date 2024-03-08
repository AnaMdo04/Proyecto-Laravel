@extends('layouts.layout') <!-- Extiende el layout principal -->

@section('content') <!-- Define la sección 'content' -->
<div class="container mt-4">

    <h2>Detalles del Juego: {{ $juego->nombre }}</h2> <!-- Título de la página con el nombre del juego -->

    <div> <!-- Inicia un contenedor para mostrar los detalles del juego -->

        <p><strong>Descripción:</strong> {{ $juego->descripcion }}</p> <!-- Muestra la descripción del juego -->
        <p><strong>Precio:</strong> ${{ number_format($juego->precio, 2) }}</p> <!-- Muestra el precio del juego formateado -->
        <p><strong>Edad Mínima:</strong> {{ $juego->edad_minima }} años</p> <!-- Muestra la edad mínima requerida para jugar -->
        <p><strong>Stock:</strong> {{ $juego->stock }} unidades</p> <!-- Muestra el stock disponible del juego -->

        <!-- Verifica si el juego tiene un fabricante asociado -->

        @if ($juego->fabricante)
        <p><strong>Fabricante:</strong> {{ $juego->fabricante->nombre }}</p> <!-- Muestra el nombre del fabricante -->
        <p><strong>País del Fabricante:</strong> {{ $juego->fabricante->pais }}</p> <!-- Muestra el país del fabricante -->

        <!-- Bucle para mostrar las imágenes asociadas al juego -->

        @foreach($juego->imagenes as $imagen)
        <img src="{{ Storage::url($imagen->ruta_imagen) }}" alt="Imagen del juego"> <!-- Muestra la imagen del juego -->
        @endforeach
        @endif
    </div>

    <!-- Enlace para ver los comentarios asociados al juego -->

    <a href="{{ route('juegos.comentarios', $juego->idJuego) }}" class="btn btn-primary">Ver Comentarios</a>

    <!-- Enlace para volver al listado de juegos -->

    <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver al listado</a>

</div>
@endsection <!-- Fin de la sección 'content' -->