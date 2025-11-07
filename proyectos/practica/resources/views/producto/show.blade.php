@extends('pages.base')

@section('title', 'Producto')

@section('section')

    <p>ID: {{ $producto->id }}</p>
    <p>Nombre: {{ $producto->nombre ?? '—' }}</p>
    <br>
    <a href="{{ route('producto.index') }}" class="btn btn-primary">Volver</a>

@endsection