@extends('pages.base')

@section('title', 'Producto')

@section('section')
    <form action="{{ route('producto.update', $producto) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control"> <br>

        <label for="nombre" class="form-label">Descripcion</label>
        <input type="text" name="descripcion" value="{{ $producto->descripcion }}" class="form-control"> <br>

        <label for="nombre" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" value="{{ $producto->cantidad }}" class="form-control"> <br>

        <label for="nombre" class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection