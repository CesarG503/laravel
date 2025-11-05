@extends('pages.base')

@section('title', 'INICIO')

@section('section')

<h1>Bienvenido al Incio CRUD</h1>


<br><br>

<x-table>
    @if ($empleados->isNotEmpty())

    @foreach ($empleados as $empleado)

    <tr>
        <td>{{$empleado->nombre}}</td>
        <td>{{$empleado->edad}}</td>
        <td>{{$empleado->dui}}</td>
        <td>{{$empleado->paiz}}</td>
        <td>{{$empleado->numero}}</td>
        <td>{{$empleado->id_empresa}}</td>
        <td>
            <form action="{{ route("empleados.destroy", $empleado->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">ELIMINAR</button>
            </form>
        </td>
        <td>
            <form action="{{ route("empleados.edit", $empleado->id) }}" method="post">
                @csrf
                <button type="submit">EDITAR</button>
            </form>
        </td>
             
    </tr>
    
    @endforeach
    @else
    <tr>
        <td colspan="8">No hay empleados</td>
    </tr>
    @endif
</x-table>

@endsection