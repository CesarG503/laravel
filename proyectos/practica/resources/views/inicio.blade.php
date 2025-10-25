@extends('layout.base')

@section('titulo', 'INICIO')

@section('header')

<h1>BIENVENIDOS</h1>

@endsection

@section('content')

<x-card :px="300"> 
    <h4> Cesar Alexander Garay</h4>
    
    <x-slot:body>
        <p>Como estan?</p>
    </x-slot:body>
    <x-slot:footer>
        <p>Fin de la card</p>
    </x-slot:footer>
</x-card>

@endsection