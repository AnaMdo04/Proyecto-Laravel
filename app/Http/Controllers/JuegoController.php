<?php
// app/Http/Controllers/JuegoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Fabricante; // Asegúrate de usar el modelo correcto para Juego
use App\Models\Comentario; // Asegúrate de usar el modelo correcto para Comentario
use App\Models\Puntuacion; // Asegúrate de usar el modelo correcto para Comentario


class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::paginate(10);
        return view('juegos.index', compact('juegos')); // Cambia 'juegos.index' a 'index'
    }



    public function create()
    {
        $fabricantes = Fabricante::all(); // Obtiene todos los fabricantes
        return view('juegos.create', compact('fabricantes')); // Pasa los fabricantes a la vista
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'edad_minima' => 'required|integer',
            'stock' => 'required|integer',
            'idFabricante' => 'required|exists:fabricantes,idFabricante',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Crea el juego sin las imágenes primero
        $juego = Juego::create($validatedData);

        // Manejo de las imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $rutaImagen = $imagen->store('imagenes', 'public');

                // Suponiendo que tu modelo Juego tiene una relación imagenes() para esto
                $juego->imagenes()->create([
                    'ruta_imagen' => $rutaImagen,
                ]);
            }
        }

        return redirect()->route('juegos.index')->with('success', 'Juego creado correctamente');
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
        return view('juegos.edit', compact('juego', 'fabricantes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'edad_minima' => 'required|integer',
            'stock' => 'required|integer',
            'idFabricante' => 'required|exists:fabricantes,idFabricante',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $juego = Juego::findOrFail($id);
        $juego->update($validatedData);

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $rutaImagen = $imagen->store('imagenes', 'public');

                $juego->imagenes()->create([
                    'ruta_imagen' => $rutaImagen,
                ]);
            }
        }

        return redirect()->route('juegos.index')->with('success', 'Juego actualizado correctamente');
    }



    // Elimina un juego de la base de datos.
    public function destroy($id)
    {
        $juego = Juego::findOrFail($id);

        // Elimina todas las puntuaciones relacionadas con el juego
        Puntuacion::where('idJuego', $id)->delete();

        // Ahora puedes eliminar el juego de forma segura
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
