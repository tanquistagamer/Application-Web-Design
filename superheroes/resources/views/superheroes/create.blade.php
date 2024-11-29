@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Superhéroe</h1>
    <form action="{{ route('superheroes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="real_name">Nombre Real:</label>
            <input type="text" name="real_name" id="real_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hero_name">Nombre de Héroe:</label>
            <input type="text" name="hero_name" id="hero_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="photo_url">URL de la Foto:</label>
            <input type="url" name="photo_url" id="photo_url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="additional_info">Información Adicional:</label>
            <textarea name="additional_info" id="additional_info" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
