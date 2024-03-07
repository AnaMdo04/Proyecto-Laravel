@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Comentarios del juego: {{ $juego->nombre }}</h2>
    <div class="list-group">
        @forelse($juego->comentarios as $comentario)
        <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $comentario->titulo }}</h5>
                <small>Fecha: {{ $comentario->created_at->format('d/m/Y') }}</small>
            </div>
            <p class="mb-1">{{ $comentario->contenido }}</p>
            <small>Escrito por: {{ $comentario->usuario->nombre ?? 'Anónimo' }}</small>
        </div>
        @empty
        <p>No hay comentarios para este juego.</p>
        @endforelse
    </div>
    <a href="{{ route('juegos.show', $juego->idJuego) }}" class="btn btn-primary mt-3">Volver al juego</a>
</div>
@endsection