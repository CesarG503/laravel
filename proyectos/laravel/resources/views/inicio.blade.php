
@extends('pages.base')


@section('title','Inicio')


@section('section')
<h1>Proyecto realizado en 1h:32 minutos</h1>
<h1 class="text-success-emphasis">Tabla CRUD</h1>

@error('nombre')
<p style="color: red;">Ingrese el nombre correctamente</p>
@enderror

@if (session('success'))
<div class="alert alert-success">
        <h5 style="color: green;">{{session('success')}}</h5>
 
</div>

@endif

@isset($cliente)

<h1 class="text text-alert-subtle">MODO EDICION</h1>
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
    <button type="submit" class="btn btn-success">ACEPTAR</button>
    <a href="{{ route('clientes.index')  }}" class="btn btn-danger">CANCELAR</a>

</form>

@else

<form action="{{ route('clientes.store') }}" method="post" class="">
    @csrf
<div class="input-group-text">
    <label for="" class="form-text m-2">Nombre</label>
    <input type="text" name="nombre" id="" class="form-control"> <br>

    <label for="" class="form-text m-2">Apellido</label>
    <input type="text" name="apellido" id=""> <br>
    
    
    <label for="" class="form-text m-2">Edad</label>
    <input type="number" name="edad" id="" min="0" class="input-group-sm"> <br>
     

    <select name="id_empresa" id="" class="form-select m-2" style="max-width: 300px;">
        @foreach ($empresas as $empresa)

        <option value="{{$empresa->id  }}">{{$empresa->nombre}}</option>
        
        @endforeach
    </select>

    <br>
    <button type="submit" class="btn btn-success m-2">ACEPTAR</button>
    </div>
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
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
            <td>
                <form action="{{route('clientes.edit', $cliente->id)}}" method="get">
                
                <button type="submit" class="btn btn-success">Editar</button>
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