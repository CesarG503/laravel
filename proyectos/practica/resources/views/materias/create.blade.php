@extends('pages.base')

@section('title', 'Materias')

@section('content')
<div class="max-w-lg mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Materias</h1>

    <form action="{{ route('materias.store') }}" method="POST" class="card bg-base-100 p-6 space-y-4">
        @csrf

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre"   class="form-control"> <br>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection