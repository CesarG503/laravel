@extends('pages.base')

@section('title', 'Producto')

@section('section')
    <form action="{{ route('producto.store') }}" method="POST">
        @csrf

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control"> <br>

        <label for="nombre" class="form-label">Descripcion</label>
        <input type="text" name="descripcion" class="form-control"> <br>

        <label for="nombre" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" class="form-control"> <br>

        <label for="nombre" class="form-label">Precio</label>
        <input type="number" name="precio" class="form-control" step="0.01"> <br>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

<x-table>
    @foreach($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre}}</td>
        <td>{{ $producto->descripcion}}</td>
        <td>{{ $producto->cantidad}}</td>
        <td>{{ $producto->precio}}</td>

        <td>
            <a href="{{ route('producto.edit', $producto) }}" class="btn btn-success">Editar</a>
            <form action="{{ route('producto.destroy', $producto) }}" method="POST" class='d-inline'>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</x-table>
@endsection