@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Agregar Nuevo Producto
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div><br />
    @endif

    <!-- Formulario actualizado -->
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="picture" class="form-label">Imagen del Producto</label>
        <input class="form-control" type="file" name="picture">
      </div>
      <div class="form-group">
        <label for="cliente">Cliente:</label>
        <input type="text" class="form-control" name="cliente" value="{{ old('cliente') }}">
      </div>
      <div class="form-group">
        <label for="producto">Producto:</label>
        <input type="text" class="form-control" name="producto" value="{{ old('producto') }}">
      </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text" class="form-control" name="precio" value="{{ old('precio') }}">
      </div>
      <div class="form-group">
        <label for="tracking">Tracking:</label>
        <textarea class="form-control" name="tracking" rows="2" columns="5">{{ old('tracking') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    <!-- Fin del formulario -->
    
  </div>
</div>
@endsection
