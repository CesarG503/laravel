@extends('pages.base')

@section('title', 'Producto')

@section('section')
    <form action="{{ route('producto.update', $producto) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection