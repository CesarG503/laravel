@extends('pages.base')

@section('title', 'Materias')

@section('content')
    <form action="{{ route('materias.update', $materias) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $materias->nombre }}" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection