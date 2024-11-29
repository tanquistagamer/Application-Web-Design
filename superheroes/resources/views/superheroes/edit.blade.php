@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Superhéroe</h1>
    <form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="real_name">Nombre Real:</label>
            <input type="text" name="real_name" id="real_name" class="form-control" value="{{ $superhero->real_name }}" required>
        </div>
        <div class="form-group">
            <label for="hero_name">Nombre de Héroe:</label>
            <input type="text" name="hero_name" id="hero_name" class="form-control" value="{{ $superhero->hero_name }}" required>
        </div>
        <div class="form-group">
            <label for="photo_url">URL de la Foto:</label>
            <input type="url" name="photo_url" id="photo_url" class="form-control" value="{{ $superhero->photo_url }}" required>
        </div>
        <div class="form-group">
            <label for="additional_info">Información Adicional:</label>
            <textarea name="additional_info" id="additional_info" class="form-control">{{ $superhero->additional_info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
