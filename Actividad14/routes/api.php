<?php

use App\Http\Controllers\Api\NoteController;

Route::apiResource('notes', NoteController::class);

// Ruta de prueba para verificar conexión
Route::get('/test', function () {
    return response()->json(['message' => 'API is working'], 200);
});