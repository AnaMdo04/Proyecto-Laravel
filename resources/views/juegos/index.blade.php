@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>Listado de Juegos</h2>
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
                @foreach ($juegos as $juego)
                <tr>
                    <td>{{ $juego->nombre }}</td>
                    <td>{{ Str::limit($juego->descripcion, 50) }}</td>
                    <td>${{ number_format($juego->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('juegos.show', $juego->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este juego?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $juegos->links() }} <!-- Paginación -->
</div>
@endsection