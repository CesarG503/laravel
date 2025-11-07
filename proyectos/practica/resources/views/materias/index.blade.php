@extends('pages.base')

@section('title', 'Materias')

@section('content')

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materias)
                    <tr>
                        <td>{{ $materias->id }}</td>
                        <td>{{ $materias->nombre ?? '—' }}</td>
                        <td class="text-right space-x-1">
                            <a href="{{ route('materias.show', $materias) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('materias.edit', $materias) }}" class="btn btn-success">Editar</a>
                            <form action="{{ route('materias.destroy', $materias) }}" method="POST">
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