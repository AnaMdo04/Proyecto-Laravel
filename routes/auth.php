<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Rutas para usuarios no autenticados

Route::middleware('guest')->group(function () {

    // Ruta para mostrar formulario de registro

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    // Ruta para procesar el registro

    Route::post('register', [RegisteredUserController::class, 'store']);

    // Ruta para mostrar formulario de inicio de sesión

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // Ruta para procesar el inicio de sesión

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Ruta para solicitar restablecimiento de contraseña

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Ruta para enviar correo electrónico de restablecimiento de contraseña

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Ruta para mostrar formulario de restablecimiento de contraseña

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    // Ruta para procesar el restablecimiento de contraseña

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Rutas para usuarios autenticados

Route::middleware('auth')->group(function () {

    // Ruta para mostrar aviso de verificación de correo electrónico

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    // Ruta para verificar correo electrónico

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Ruta para enviar notificación de verificación de correo electrónico

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Ruta para mostrar formulario de confirmación de contraseña

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    // Ruta para procesar la confirmación de contraseña

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Ruta para actualizar la contraseña

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Ruta para cerrar sesión

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
