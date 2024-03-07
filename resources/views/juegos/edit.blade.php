@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h1>Editar Juego: {{ $juego->nombre }}</h1>
    <form method="POST" action="{{ route('juegos.update', $juego->idJuego) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $juego->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $juego->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $juego->precio }}" required>
        </div>

        <div class="form-group">
            <label for="edad_minima">Edad Mínima:</label>
            <input type="number" class="form-control" id="edad_minima" name="edad_minima" value="{{ $juego->edad_minima }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $juego->stock }}" required>
        </div>
        <div class="form-group">
            <label for="idFabricante">Fabricante:</label>
            <select class="form-control" id="idFabricante" name="idFabricante">
                @foreach ($fabricantes as $fabricante)
                <option value="{{ $fabricante->idFabricante }}" {{ ($juego->idFabricante == $fabricante->idFabricante) ? 'selected' : '' }}>
                    {{ $fabricante->nombre }}
                </option>
                @endforeach
            </select>


        </div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection