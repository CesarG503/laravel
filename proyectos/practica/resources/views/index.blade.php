@extends('pages.base')

@section('title', 'INICIO')

@section('section')

@if(session('success'))

<x-alert tipo="success">
    {{session('success')}}
</x-alert>

@endif

@if ($errors->any())

<x-alert tipo="danger"> 
    <ul>
    @foreach ( $errors->all() as $error)
        <li>
            {{$error}}
        </li>
    
    @endforeach
    </ul>
</x-alert>

@endif


<div class="d-flex  justify-content-center" >

<form action="{{ Route('estudiante.store') }}" method="POST" class="col-12 col-sm-6">
    @csrf 
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="" class="form-control"> <br>
    <label for="">Apellido: </label>
    <input type="text" name="apellido" id="" class="form-control"> <br>

    <select name="id_materia" id="" class="form-select">
        @foreach ($materias as $materia )

            <option value="{{$materia->id  }}"> {{$materia->nombre}}</option>
        
        @endforeach
    </select> <br>

    <input type="number" name="nota" id="" min="0" max="10" class="form-control" > <br>

    <button type="submit" class="btn btn-success"> Aceptar</button>
</form>
</div>

<form action="{{ route('estudiante.index') }}" method="GET">
@csrf
<label for="" class="form-label">Busqueda</label>
<select name="opcion" id="" class="form-select">
    <option value="nombre">Nombre</option>
    <option value="apellido">Apellido</option>
    <option value="id_materia">Materias</option>
    <option value="id_notas">Notas</option>
</select>
<input type="text" name="busqueda" id="" class="form-control" placeholder="Buscar ...">
<button type="submit" class="btn btn-success">Buscar</button>

</form>
<x-table>
@if($estudiantes->isNotEmpty())

@foreach ($estudiantes as $estudiante )
<tr>
    <td>{{$estudiante->nombre}}</td>
    <td>{{$estudiante->apellido}}</td>
    <td>{{$estudiante->materia->nombre}}</td>
    <td>{{$estudiante->nota->notas}}</td>
    
</tr>
@endforeach

@endif
    
</x-table>
@endsection