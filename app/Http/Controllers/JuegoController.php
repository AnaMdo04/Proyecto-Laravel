<?php
// app/Http/Controllers/JuegoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Fabricante; // Asegúrate de usar el modelo correcto para Juego
use App\Models\Comentario; // Asegúrate de usar el modelo correcto para Comentario

class JuegoController extends Controller
{
    // Muestra un listado de juegos.
    public function index()
    {
        $juegos = Juego::paginate(10);
        return view('juegos.index', compact('juegos'));
    }

    public function create()
    {
        $fabricantes = Fabricante::all(); // Obtiene todos los fabricantes
        return view('juegos.create', compact('fabricantes')); // Pasa los fabricantes a la vista
    }

    // Almacena un nuevo juego en la base de datos.
    public function store(Request $request)
    {
        Juego::create($request->all());
        return redirect()->route('juegos.index');
    }

    // Muestra un juego específico.
    public function show($id)
    {
        $juego = Juego::with('fabricante')->findOrFail($id);
        return view('juegos.show', compact('juego'));
    }

    // Muestra el formulario para editar un juego existente.
    public function edit($id)
    {
        $juego = Juego::findOrFail($id);
        $fabricantes = Fabricante::all();
        return view('juegos.edit', compact('juego'));
    }

    // Actualiza un juego en la base de datos.
    public function update(Request $request, $id)
    {
        $juego = Juego::findOrFail($id);
        $juego->update($request->all());
        return redirect()->route('juegos.index');
    }

    // Elimina un juego de la base de datos.
    public function destroy($id)
    {
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return redirect()->route('juegos.index');
    }

    // Función adicional para cargar y mostrar comentarios relacionados con un juego.
    public function cargarComentarios($idJuego)
    {
        $juego = Juego::with('comentarios')->findOrFail($idJuego); // Asegúrate de que Juego tiene una relación 'comentarios' definida en el modelo
        return view('juegos.comentarios', compact('juego'));
    }
}
