@extends('layout.base')

@section('title', 'Editar Productos')

@section('content')
<div class="max-w-lg mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Editar Productos</h1>

    <form action="{{ route('productos.update', $productos) }}" method="POST" class="card bg-base-100 p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $productos->nombre }}" class="input input-bordered w-full">
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="btn btn-accent">Actualizar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-ghost">Cancelar</a>
        </div>
    </form>
</div>
@endsection