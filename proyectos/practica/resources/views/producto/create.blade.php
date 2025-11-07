@extends('pages.base')

@section('title', 'Producto')

@section('section')
    <form action="{{ route('producto.store') }}" method="POST">
        @csrf

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection