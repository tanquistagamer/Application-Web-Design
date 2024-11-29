@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Editar Calificación</h1>
        <form action="{{ route('grades.update', [$subject->id, $grade->id]) }}" method="POST">
            @csrf
            @method('PATCH') <!-- Cambiado de PUT a PATCH -->

            <!-- Tipo de Actividad -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipo de Actividad</label>
                <input type="text" name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" value="{{ $grade->type }}" required>
            </div>

            <!-- Calificación -->
            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Calificación (Opcional)</label>
                <input type="number" name="grade" id="grade" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" value="{{ $grade->grade }}" min="0" max="100">
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha</label>
                <input type="date" name="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" value="{{ $grade->date }}" required>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 focus:ring focus:ring-green-500">
                    Actualizar
                </button>
                <a href="{{ route('grades.index', $subject->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-700 focus:ring focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
