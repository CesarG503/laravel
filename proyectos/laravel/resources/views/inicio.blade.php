
@extends('pages.base')


@section('title','Inicio')


@section('section')
<h1>Proyecto realizado en 1h:32 minutos</h1>
<h1>Tabla CRUD</h1>

@error('nombre')
<p style="color: red;">Ingrese el nombre correctamente</p>
@enderror

@if (session('success'))
<h5 style="color: green;">{{session('success')}}</h5>
@endif

@isset($cliente)

<h1>MODO EDICION</h1>
<p>boton cancelar para salir de la edicion</p>

<form action="{{ route('clientes.update', $cliente->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="">Nombre</label>
    <input type="text" name="nombre" id="" value="{{$cliente->nombre  }}"> <br>

    <label for="">Apellido</label>
    <input type="text" name="apellido" id="" value="{{ $cliente->apellido }}"> <br>
    
    <label for="">Edad</label>
    <input type="number" name="edad" id="" min="0" value="{{$cliente->edad  }}"> <br>

    <select name="id_empresa" id="" value="{{$cliente->id_empresa }}">
        @foreach ($empresas as $empresa)

        <option value="{{$empresa->id  }}">{{$empresa->nombre}}</option>
        
        @endforeach
    </select>

    <br>
    <button type="submit">ACEPTAR</button>
    <a href="{{ route('clientes.index')  }}">CANCELAR</a>

</form>

@else

<form action="{{ route('clientes.store') }}" method="post">
    @csrf

    <label for="">Nombre</label>
    <input type="text" name="nombre" id=""> <br>

    <label for="">Apellido</label>
    <input type="text" name="apellido" id=""> <br>
    
    <label for="">Edad</label>
    <input type="number" name="edad" id="" min="0"> <br>

    <select name="id_empresa" id="">
        @foreach ($empresas as $empresa)

        <option value="{{$empresa->id  }}">{{$empresa->nombre}}</option>
        
        @endforeach
    </select>

    <br>
    <button type="submit">ACEPTAR</button>

</form>

@endisset

<x-table>
    @if(!empty( $clientes))
        @foreach ($clientes as $cliente)

        <tr>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->apellido}}</td>
            <td>{{$cliente->edad}}</td>
            <td>{{$cliente->empresa->nombre}}</td>
            <td>
                <form action="{{route('clientes.destroy', $cliente->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar</button>
                </form>
            </td>
            <td>
                <form action="{{route('clientes.edit', $cliente->id)}}" method="get">
                
                <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
        
        @endforeach

    @else
    <tr>
        <td colspan="4">No hay clientes</td>
    </tr>
    @endif
</x-table>

@endsection