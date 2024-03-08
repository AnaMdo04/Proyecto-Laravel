<?php
// app/Http/Controllers/JuegoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Fabricante;
use App\Models\Comentario;
use App\Models\Pedidos_Juegos;
use App\Models\Puntuacion;

// Define el controlador para los juegos.

class JuegoController extends Controller
{
    // Muestra la lista de juegos con paginación.

    public function index()
    {
        $juegos = Juego::paginate(10); // Pagina los juegos, 10 por página.
        return view('juegos.index', compact('juegos')); // Retorna la vista con la lista de juegos.
    }

    // Muestra el formulario para crear un nuevo juego.

    public function create()
    {
        $fabricantes = Fabricante::all(); // Obtiene todos los fabricantes desde la base de datos.
        return view('juegos.create', compact('fabricantes')); // Retorna la vista del formulario para crear un juego, pasando los fabricantes.
    }

    // Guarda un nuevo juego en la base de datos.

    public function store(Request $request)
    {
        // Valida los datos del formulario.

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'edad_minima' => 'required|integer',
            'stock' => 'required|integer',
            'idFabricante' => 'required|exists:fabricantes,idFabricante',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Crea el juego en la base de datos.

        $juego = Juego::create($validatedData);

        // Si hay imágenes, las procesa y las guarda.

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $rutaImagen = $imagen->store('imagenes', 'public');
                $juego->imagenes()->create(['ruta_imagen' => $rutaImagen]);
            }
        }

        return redirect()->route('juegos.index')->with('success', 'Juego creado correctamente');
    }

    // Muestra un juego específico.

    public function show($id)
    {
        $juego = Juego::with('fabricante')->findOrFail($id); // Carga el juego y su fabricante asociado.
        return view('juegos.show', compact('juego')); // Retorna la vista con los detalles del juego.
    }

    // Muestra el formulario para editar un juego existente.

    public function edit($id)
    {
        $juego = Juego::findOrFail($id); // Obtiene el juego a editar.
        $fabricantes = Fabricante::all(); // Obtiene todos los fabricantes.
        return view('juegos.edit', compact('juego', 'fabricantes')); // Retorna la vista del formulario para editar el juego.
    }

    // Actualiza un juego en la base de datos.

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario.

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'edad_minima' => 'required|integer',
            'stock' => 'required|integer',
            'idFabricante' => 'required|exists:fabricantes,idFabricante',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $juego = Juego::findOrFail($id); // Obtiene el juego a actualizar.
        $juego->update($validatedData); // Actualiza el juego con los datos validados.

        // Si hay imágenes nuevas, las procesa y las guarda.

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $rutaImagen = $imagen->store('imagenes', 'public');
                $juego->imagenes()->create(['ruta_imagen' => $rutaImagen]);
            }
        }

        return redirect()->route('juegos.index')->with('success', 'Juego actualizado correctamente');
    }

    // Elimina un juego y todas sus relaciones (puntuaciones) de la base de datos.

    public function destroy($id)
    {
        $juego = Juego::findOrFail($id); // Obtiene el juego a eliminar.
        Puntuacion::where('idJuego', $id)->delete(); // Elimina las puntuaciones asociadas al juego.
        Pedidos_Juegos::where('idJuego', $id)->delete(); // Elimina las puntuaciones asociadas al juego.

        $juego->delete(); // Elimina el juego.

        return redirect()->route('juegos.index'); // Redirecciona al listado de juegos.
    }

    // Carga y muestra los comentarios relacionados con un juego.

    public function cargarComentarios($idJuego)
    {
        $juego = Juego::with('comentarios')->findOrFail($idJuego); // Obtiene el juego y sus comentarios.
        return view('juegos.comentarios', compact('juego')); // Retorna la vista con los comentarios del juego.
    }
}
