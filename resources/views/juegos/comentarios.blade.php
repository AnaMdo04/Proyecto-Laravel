@extends('layouts.layout') <!-- Extiende el layout principal -->

@section('content') <!-- Define la sección 'content' -->
<div class="container">
    <h2>Comentarios del juego: {{ $juego->nombre }}</h2> <!-- Título de la sección, muestra el nombre del juego -->
    <div class="list-group">
        @forelse($juego->comentarios as $comentario) <!-- Bucle para recorrer los comentarios del juego -->
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $comentario->titulo }}</h5> <!-- Título del comentario -->
                <small>Fecha: {{ $comentario->created_at->format('d/m/Y') }}</small> <!-- Fecha de creación del comentario -->
            </div>
            <p class="mb-1">{{ $comentario->contenido }}</p> <!-- Contenido del comentario -->
            <small>Escrito por: {{ $comentario->usuario->nombre ?? 'Anónimo' }}</small> <!-- Nombre del usuario que escribió el comentario, o 'Anónimo' si el usuario no está disponible -->
        </div>
        @empty <!-- Se ejecuta si no hay comentarios para mostrar -->
        <p>No hay comentarios para este juego.</p>
        @endforelse <!-- Fin del bucle -->
    </div>
    <a href="{{ route('juegos.show', $juego->idJuego) }}" class="btn btn-primary mt-3">Volver al juego</a> <!-- Enlace para volver a la página del juego -->
</div>
@endsection <!-- Fin de la sección 'content' -->