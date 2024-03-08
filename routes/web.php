<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por RouteServiceProvider dentro de un grupo que contiene
| el middleware "web". ¡Ahora crea algo genial!
|
*/

// Página de bienvenida

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Página de índice para juegos

Route::get('/index', [JuegoController::class, 'index'])->name('index');

// Rutas de autenticación y perfil de usuario (acceso restringido)

Route::middleware(['auth', 'verified'])->group(function () {

    // Página de dashboard

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Rutas para el perfil de usuario

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de juegos (solo para usuarios autenticados)

    Route::middleware(['auth'])->group(function () {
        Route::get('/juegos', [JuegoController::class, 'index'])->name('juegos.index');
        Route::get('/juegos/create', [JuegoController::class, 'create'])->name('juegos.create');
        Route::post('/juegos', [JuegoController::class, 'store'])->name('juegos.store');
        Route::get('/juegos/{juego}', [JuegoController::class, 'show'])->name('juegos.show');
        Route::get('/juegos/{juego}/edit', [JuegoController::class, 'edit'])->name('juegos.edit');
        Route::put('/juegos/{juego}', [JuegoController::class, 'update'])->name('juegos.update');
        Route::delete('/juegos/{juego}', [JuegoController::class, 'destroy'])->name('juegos.destroy');
    });

    // Rutas de recursos para juegos

    Route::resource('juegos', JuegoController::class);

    // Ruta para cargar comentarios de un juego específico

    Route::get('juegos/{juego}/comentarios', [JuegoController::class, 'cargarComentarios'])->name('juegos.comentarios');

    // Rutas de recursos para usuarios

    Route::resource('users', UserController::class);
});

// Rutas de autenticación

require __DIR__ . '/auth.php';
