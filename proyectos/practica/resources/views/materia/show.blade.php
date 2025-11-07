@extends('pages.base')

@section('title', 'Materia')

@section('content')

    <p>ID: {{ $materia->id }}</p>
    <p>Nombre: {{ $materia->nombre ?? '—' }}</p> 
    <br>
    <a href="{{ route('materia.index') }}" class="btn btn-primary">Volver</a>

@endsection