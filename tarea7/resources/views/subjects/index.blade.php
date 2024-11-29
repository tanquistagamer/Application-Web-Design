@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Materias</h1>
        <a href="{{ route('subjects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            Agregar Nueva Materia
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
        <table class="table-auto w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">#</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $subject)
                <tr class="border-t border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $subject->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                        <div class="flex space-x-2">
                            <a href="{{ route('grades.index', $subject->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                Ver Calificaciones
                            </a>
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Editar
                            </a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta materia?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 flex items-center space-x-2">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Eliminar</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                        No hay materias registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
