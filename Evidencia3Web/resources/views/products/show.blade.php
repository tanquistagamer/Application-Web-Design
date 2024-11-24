@extends('layouts.app') 

@section('content') 
  <style> 
    .uper { 
      margin-top: 40px; 
    } 
  </style> 
  <div class="card uper"> 
    <div class="card-header"> 
      Ver Producto 
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

      <div class="form-group"> 
        <label for="cliente">Cliente:</label> 
        <input type="text" class="form-control" name="cliente" value="{{ $product->cliente }}" disabled /> 
      </div> 
      <div class="form-group"> 
        <label for="producto">Producto:</label> 
        <input type="text" class="form-control" name="producto" value="{{ $product->producto }}" disabled /> 
      </div> 
      <div class="form-group"> 
        <label for="precio">Precio:</label> 
        <input type="text" class="form-control" name="precio" value="{{ $product->precio }}" disabled /> 
      </div> 
      <div class="form-group"> 
        <label for="tracking">Tracking:</label> 
        <input type="text" class="form-control" name="tracking" value="{{ $product->tracking }}" disabled /> 
      </div> 
      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a> 
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a> 
    </div> 
  </div> 
@endsection 
