@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Agregar Nueva Calificación</h1>

    <form action="{{ route('grades.store', $subject->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Calificación</label>
            <input type="text" name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-gray-200" required>
        </div>
        <div class="mb-4">
            <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Calificación</label>
            <input type="number" name="grade" id="grade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-gray-200" required>
        </div>
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
            <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-gray-200" required>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Guardar</button>
            <a href="{{ route('grades.index', $subject->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700">Cancelar</a>
        </div>
    </form>
</div>
@endsection
