@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Superhéroe</h1>
    <p><strong>Nombre Real:</strong> {{ $superhero->real_name }}</p>
    <p><strong>Nombre de Héroe:</strong> {{ $superhero->hero_name }}</p>
    <p><strong>Foto:</strong></p>
    <img src="{{ $superhero->photo_url }}" alt="{{ $superhero->hero_name }}" class="img-fluid">
    <p><strong>Información Adicional:</strong> {{ $superhero->additional_info }}</p>
    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
