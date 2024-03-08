@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Juego: {{ $juego->nombre }}</h2>
    <div>
        <p><strong>Descripción:</strong> {{ $juego->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ number_format($juego->precio, 2) }}</p>
        <p><strong>Edad Mínima:</strong> {{ $juego->edad_minima }} años</p>
        <p><strong>Stock:</strong> {{ $juego->stock }} unidades</p>
        @if ($juego->fabricante)
        <p><strong>Fabricante:</strong> {{ $juego->fabricante->nombre }}</p>
        <p><strong>País del Fabricante:</strong> {{ $juego->fabricante->pais }}</p>
        @foreach($juego->imagenes as $imagen)
        <img src="{{ Storage::url($imagen->ruta_imagen) }}" alt="Imagen del juego">
        @endforeach

        @endif
    </div>
    <a href="{{ route('juegos.comentarios', $juego->idJuego) }}" class="btn btn-primary">Ver Comentarios</a>
    <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection