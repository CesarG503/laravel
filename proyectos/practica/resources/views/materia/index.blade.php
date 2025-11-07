@extends('pages.base')

@section('title', 'Materia')

@section('section')

        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nombre ?? '—' }}</td>
                        <td class="text-right space-x-1">
                            <a href="{{ route('materia.show', $materia) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('materia.edit', $materia) }}" class="btn btn-success">Editar</a>
                            <form action="{{ route('materia.destroy', $materia) }}" method="POST" class="d-inline" >
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