<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController; // Asegúrate de importar el controlador TaskController
use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard (solo accesible si el usuario está autenticado y verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para el perfil del usuario (solo accesible si el usuario está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Aquí agregamos las rutas para las tareas
    Route::resource('tasks', TaskController::class); // Crea las rutas CRUD para las tareas
    Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete'); // Ruta para completar una tarea
});

require __DIR__.'/auth.php';  // Este archivo se encarga de las rutas de autenticación (registro, login, etc.)
