@extends('layouts.layout') <!-- Extiende el layout principal -->

@section('content') <!-- Define la sección 'content' -->
<div class="container mt-4">

    <h1>Editar Juego: {{ $juego->nombre }}</h1> <!-- Título de la página, muestra el nombre del juego a editar -->

    <form method="POST" action="{{ route('juegos.update', $juego->idJuego) }}" enctype="multipart/form-data"> <!-- Formulario para editar el juego -->
        @csrf <!-- Directiva de Blade para incluir el token CSRF -->
        @method('PUT') <!-- Método HTTP para la actualización -->

        <!-- Campo para el nombre del juego -->

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $juego->nombre }}" required>
        </div>

        <!-- Campo para la descripción del juego -->

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $juego->descripcion }}</textarea>
        </div>

        <!-- Campo para el precio del juego -->

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $juego->precio }}" required>
        </div>

        <!-- Campo para la edad mínima del juego -->

        <div class="form-group">
            <label for="edad_minima">Edad Mínima:</label>
            <input type="number" class="form-control" id="edad_minima" name="edad_minima" value="{{ $juego->edad_minima }}" required>
        </div>

        <!-- Campo para el stock del juego -->

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $juego->stock }}" required>
        </div>

        <!-- Campo para seleccionar el fabricante del juego -->

        <div class="form-group">
            <label for="idFabricante">Fabricante:</label>
            <select class="form-control" id="idFabricante" name="idFabricante">

                <!-- Bucle para mostrar todas las opciones de fabricantes disponibles -->

                @foreach ($fabricantes as $fabricante)
                <option value="{{ $fabricante->idFabricante }}" {{ ($juego->idFabricante == $fabricante->idFabricante) ? 'selected' : '' }}>
                    {{ $fabricante->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Campo para subir imágenes -->

        <input type="file" name="imagenes[]" multiple>

        <!-- Botón para enviar el formulario -->

        <button type="submit" class="btn btn-primary">Actualizar</button>

        <!-- Enlace para cancelar la edición y volver al listado de juegos -->

        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection <!-- Fin de la sección 'content' -->