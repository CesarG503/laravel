@extends('plantilla')

@section('section')

<h1>Bienvenidos</h1>

<form action="aceptar" method="POST">
   
    @csrf
    <input type="text" name="nombre" id="" placeholder="nombre">
    <input type="text" name="apellido" id="" placeholder="apellido">

    <input type="submit" value="ACEPTAR">
</form>

@endsection