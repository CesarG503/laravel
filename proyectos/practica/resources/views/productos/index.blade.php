@extends('pages.base')

@section('title', 'Productos - Listado')

@section('section')
<div class="max-w-5xl mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Productos</a>
    </div>

    <div class="overflow-x-auto bg-base-100 rounded-box shadow-sm">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre ?? '—' }}</td>
                        <td class="text-right space-x-1">
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-accent">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error" onclick="return confirm('¿Eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection