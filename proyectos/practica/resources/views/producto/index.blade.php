@extends('pages.base')

@section('title', 'Producto')

@section('section')

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre ?? '—' }}</td>
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
            </tbody>
        </table>

@endsection