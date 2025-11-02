@extends('pages.base')

@section('title', 'CRUD')

@section('section')

<h1>CRUD</h1>

@error('nombre')
<h1>error en el nombre</h1>
@enderror

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@isset($empleado)
<H1>Modo edicion</H1>
<form action="{{route('empleados.update' , $empleado->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="">ID:</label>
    <input type="number" name="id" value="{{ $empleado->id }}" readonly> <br>
    <label for="">Nombre:</label>
    <input type="text" name="nombre" id="" placeholder="Ingrese su nombre" value="{{  $empleado->nombre}}"> <br>

    <label for="">Seleccione una empresa:</label>
    <select name="empresa_id" id="">
        @foreach ($empresas as $empresa)
        <option value="{{ $empresa->id}}">{{$empresa->nombre}}</option>
        @endforeach
        
    </select>
    <br>
    <button type="submit">Aceptar</button>
    <a href="{{ route('empleados.index')}}">CANCELAR</a>
</form>
@else
<form action="{{route('empleados.store')  }}" method="POST">
    @csrf
    <label for="">Nombre:</label>
    <input type="text" name="nombre" id="" placeholder="Ingrese su nombre"> <br>

    <label for="">Seleccione una empresa:</label>
    <select name="empresa_id" id="">
        @foreach ($empresas as $empresa)
        <option value="{{ $empresa->id}}">{{$empresa->nombre}}</option>
        @endforeach
        
    </select>
    <br>
    <button type="submit">Aceptar</button>
</form>
@endisset



<table border="1">
    <thead>
        <th>nombre</th>
        <th>Empresa ID</th>
        <th>Borrar</th>
        <th>Editar</th>
    </thead>
    <tbody>

    @isset($empleados)
        @foreach ($empleados as $empleado )

        <tr>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->empresa->nombre}}</td>
            <td>
                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="post">
                     @csrf
                     @method('DELETE')
                     <button>Borrar</button>
                </form>
            </td>
            <td>
                <a href="{{ route('empleados.edit' , $empleado->id) }}">
                    <button >Editar</button>
                </a>

            </td>
        </tr>
        
        @endforeach

    @else
        <tr>
            <td colspan="2">No hay datos</td>
        </tr>
    @endisset



    </tbody>
</table>




@endsection