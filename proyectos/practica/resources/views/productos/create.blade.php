@extends('layout.base')

@section('title', 'Crear Productos')

@section('content')
<div class="max-w-lg mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Crear Productos</h1>

    <form action="{{ route('productos.store') }}" method="POST" class="card bg-base-100 p-6 space-y-4">
        @csrf

        <div>
            <label for="nombre" class="label">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" class="input input-bordered w-full">
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-ghost">Cancelar</a>
        </div>
    </form>
</div>
@endsection