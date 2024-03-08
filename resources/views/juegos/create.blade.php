@extends('layouts.layout') <!-- Extiende el layout principal -->

@section('content') <!-- Define la sección 'content' -->
<div class="container mt-4">

    <h1>Añadir Nuevo Juego</h1>

    <form method="POST" action="{{ route('juegos.store') }}" enctype="multipart/form-data"> <!-- Formulario para añadir un nuevo juego -->
        @csrf <!-- Directiva de Blade para incluir el token CSRF -->

        <!-- Campo para el nombre del juego -->

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Juego" required>
        </div>

        <!-- Campo para la descripción del juego -->

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del Juego" required></textarea>
        </div>

        <!-- Campo para el precio del juego -->

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" step="0.01" required>
        </div>

        <!-- Campo para la edad mínima del juego -->

        <div class="form-group">
            <label for="edad_minima">Edad Mínima:</label>
            <input type="number" class="form-control" id="edad_minima" name="edad_minima" placeholder="Edad Mínima" required>
        </div>

        <!-- Campo para el stock del juego -->

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock Disponible" required>
        </div>

        <!-- Campo para seleccionar el fabricante del juego -->

        <div class="form-group">
            <label for="idFabricante">Fabricante:</label>
            <select class="form-control" id="idFabricante" name="idFabricante">

                <!-- Bucle para mostrar todas las opciones de fabricantes disponibles -->

                @foreach ($fabricantes as $fabricante)
                <option value="{{ $fabricante->idFabricante }}">{{ $fabricante->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para subir imágenes -->

        <input type="file" name="imagenes[]" multiple>

        <!-- Botón para enviar el formulario -->

        <button type="submit" class="btn btn-primary">Crear Juego</button>
    </form>
</div>
@endsection <!-- Fin de la sección 'content' -->