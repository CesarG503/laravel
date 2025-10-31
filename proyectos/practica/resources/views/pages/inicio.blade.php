@extends('pages.base')

@section('section')

<h1>Inicio</h1>
<h2>{{$loco}}</h2>

<table border="1">
    <thead>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </thead>
    <tbody>
        @isset($productos)

        @foreach ($productos as $producto)

        <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>{{$producto->precio}}</td>
        </tr>
        
        @endforeach

        @endisset

    </tbody>
</table>

@endsection