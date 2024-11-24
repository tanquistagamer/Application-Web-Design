@extends('layouts.app') 
@section('content') 
  <style> 
    .margin { 
      margin-top: 40px; 
    } 
  </style> 
  <div class="margin"> 
    @if (session()->get('success')) 
      <div class="alert alert-success"> 
        {{ session()->get('success') }} 
      </div><br /> 
    @endif 
    <div class="row mb-3"> 
      <a class="btn btn-primary" href="{{ route('products.create') }}">Agregar Producto</a> 
    </div> 

    <table class="table table-striped"> 
      <thead> 
        <tr> 
          <th>No</th> 
          <th>Cliente</th> 
          <th>Producto</th> 
          <th>Precio</th> 
          <th>Tracking</th> 
          <th width="80px"></th> 
          <th width="80px"></th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($products as $product) 
          <tr> 
            <td><a href="{{ route('products.show', $product->id) }}">{{ $product->id }}</a></td> 
            <td>{{ $product->cliente }}</td> 
            <td>{{ $product->producto }}</td> 
            <td>{{ $product->precio }}</td> 
            <td>{{ $product->tracking }}</td> 
            <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a></td> 
            <td> 
              <form action="{{ route('products.destroy', $product->id) }}" method="post"> 
                @csrf 
                @method('DELETE') 
                <button class="btn btn-danger" type="submit">Eliminar</button> 
              </form> 
            </td> 
          </tr> 
        @endforeach 
      </tbody> 
    </table> 
  </div> 
@endsection 
