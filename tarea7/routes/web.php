<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

// Ruta principal que redirige al listado de materias
Route::get('/', [SubjectController::class, 'index'])->name('home');

// Ruta del dashboard (requiere autenticación y verificación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Agrupación de rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    // Rutas para perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para CRUD de materias (Subjects)
    Route::resource('subjects', SubjectController::class);

    // Rutas para las calificaciones (Grades)
    Route::get('subjects/{subject}/grades', [GradeController::class, 'index'])->name('grades.index'); // Listar calificaciones
    Route::get('subjects/{subject}/grades/create', [GradeController::class, 'create'])->name('grades.create'); // Formulario crear calificación
    Route::post('subjects/{subject}/grades', [GradeController::class, 'store'])->name('grades.store'); // Guardar calificación
    Route::get('subjects/{subject}/grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit'); // Formulario editar calificación
    Route::patch('subjects/{subject}/grades/{grade}', [GradeController::class, 'update'])->name('grades.update'); // Actualizar calificación
    Route::delete('subjects/{subject}/grades/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy'); // Eliminar calificación
});

// Archivo de autenticación (auth.php)
require __DIR__ . '/auth.php';
