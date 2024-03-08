@extends('layouts.layout') <!-- Extiende el layout principal -->

@section('content') <!-- Define la sección 'content' -->
<div class="container mt-4">

    <h2>Listado de Juegos</h2>

    <!-- Enlace para añadir un nuevo juego -->

    <a href="{{ route('juegos.create') }}" class="btn btn-primary mb-3">Añadir nuevo juego</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($juegos as $juego) <!-- Bucle para recorrer la lista de juegos -->
                <tr>
                    <td>{{ $juego->nombre }}</td> <!-- Muestra el nombre del juego -->
                    <td>{{ Str::limit($juego->descripcion, 50) }}</td> <!-- Muestra una versión truncada de la descripción -->
                    <td>${{ number_format($juego->precio, 2) }}</td> <!-- Muestra el precio del juego formateado -->
                    <td>
                        <!-- Enlace para ver el detalle del juego -->

                        <a href="{{ route('juegos.show', ['juego' => $juego->idJuego]) }}" class="btn btn-info btn-sm">Ver</a>

                        <!-- Enlace para editar el juego -->

                        <a href="{{ route('juegos.edit', ['juego' => $juego->idJuego]) }}" class="btn btn-secondary btn-sm">Editar</a>

                        <!-- Formulario para eliminar el juego -->

                        <form action="{{ route('juegos.destroy', ['juego' => $juego->idJuego]) }}" method="POST" style="display: inline-block;">
                            @csrf <!-- Directiva de Blade para incluir el token CSRF -->
                            @method('DELETE') <!-- Método HTTP para la eliminación -->

                            <!-- Botón para enviar el formulario de eliminación -->
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este juego?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty <!-- Si no hay juegos -->
                <tr>
                    <td colspan="4">No hay juegos disponibles.</td> <!-- Celda de tabla para mostrar el mensaje de no hay juegos -->
                </tr>
                @endforelse
            </tbody>
        </table> <!-- Fin de la tabla -->
    </div>

    <div class="d-flex justify-content-center">
        {{ $juegos->links('pagination::bootstrap-4') }} <!-- Renderiza la paginación con el estilo de Bootstrap 4 -->
    </div>

</div>
@endsection <!-- Fin de la sección 'content' -->