@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Editar Materia</h1>
            
            <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nombre de la Materia
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $subject->name) }}" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200" 
                           placeholder="Ingresa el nombre de la materia" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('subjects.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
