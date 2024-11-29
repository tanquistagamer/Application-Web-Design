@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Calificaciones de {{ $subject->name }}
        </h1>
        <a href="{{ route('grades.create', $subject->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            Agregar Nueva Calificación
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
        <table class="table-auto w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">#</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Tipo</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Calificación</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Fecha</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grades as $grade)
                <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $grade->type }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $grade->grade }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $grade->date }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                        <div class="flex space-x-2">
                            <a href="{{ route('grades.edit', ['subject' => $subject->id, 'grade' => $grade->id]) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Editar
                            </a>
                            <form action="{{ route('grades.destroy', ['subject' => $subject->id, 'grade' => $grade->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta calificación?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                        No hay calificaciones registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('subjects.index') }}" class="text-blue-600 hover:underline">Volver a Materias</a>
    </div>
</div>
@endsection
