@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Superhéroes</h1>
    <a href="{{ route('superheroes.create') }}" class="btn btn-primary mb-3">Agregar Superhéroe</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Real</th>
                <th>Nombre de Héroe</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($superheroes as $hero)
                <tr>
                    <td>{{ $hero->id }}</td>
                    <td>{{ $hero->real_name }}</td>
                    <td>{{ $hero->hero_name }}</td>
                    <td>
                        <a href="{{ route('superheroes.show', $hero->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('superheroes.edit', $hero->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('superheroes.destroy', $hero->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay superhéroes registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
