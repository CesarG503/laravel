@extends('layout.base')

@section('title', 'Detalles de Productos')

@section('content')
<div class="max-w-lg mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Detalles de Productos</h1>

    <div class="card bg-base-100 shadow-sm p-6 space-y-2">
        <p><span class="font-semibold">ID:</span> {{ $productos->id }}</p>
        <p><span class="font-semibold">Nombre:</span> {{ $productos->nombre ?? '—' }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('productos.index') }}" class="btn btn-outline">Volver</a>
    </div>
</div>
@endsection