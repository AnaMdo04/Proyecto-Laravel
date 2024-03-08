<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de perfil del usuario.
     * 
     * @param Request $request Datos de la solicitud actual.
     * 
     * @return Response Vista de edición del perfil renderizada por Inertia.
     */

    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [

            // Determina si el usuario necesita verificar su correo electrónico.

            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,

            // Obtiene cualquier mensaje de estado de la sesión para mostrar al usuario.

            'status' => session('status'),
        ]);
    }

    /**
     * Actualiza la información del perfil del usuario.
     * 
     * @param ProfileUpdateRequest $request Validación especial para la actualización del perfil.
     * 
     * @return RedirectResponse Redirige al usuario de vuelta al formulario de edición del perfil.
     */

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Rellena el modelo de usuario con los datos validados del formulario.

        $request->user()->fill($request->validated());

        // Si el email fue modificado, resetea la fecha de verificación a null.

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en el modelo de usuario.

        $request->user()->save();

        // Redirige al usuario de vuelta al formulario de edición del perfil.

        return Redirect::route('profile.edit');
    }

    /**
     * Elimina la cuenta del usuario.
     * 
     * @param Request $request Datos de la solicitud actual.
     * 
     * @return RedirectResponse Redirige al usuario a la página de inicio después de la eliminación.
     */

    public function destroy(Request $request): RedirectResponse
    {
        // Valida que la contraseña actual sea correcta antes de permitir la eliminación.

        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Cierra la sesión del usuario.

        Auth::logout();

        // Elimina el modelo de usuario.

        $user->delete();

        // Invalida la sesión actual y regenera el token de la sesión para seguridad.

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige al usuario a la página de inicio.

        return Redirect::to('/');
    }
}
