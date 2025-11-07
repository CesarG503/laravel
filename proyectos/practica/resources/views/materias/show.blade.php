@extends('pages.base')

@section('title', 'Materias')

@section('content')

    <p>ID: {{ $materias->id }}</p>
    <p>Nombre: {{ $materias->nombre ?? '—' }}</p> 
    <br>
    <a href="{{ route('materias.index') }}" class="btn btn-primary">Volver</a>

@endsection