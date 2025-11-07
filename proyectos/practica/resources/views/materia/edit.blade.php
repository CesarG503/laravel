@extends('pages.base')

@section('title', 'Materia')

@section('content')
    <form action="{{ route('materia.update', $materia) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ $materia->nombre }}" class="form-control"> <br>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('materia.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

@endsection