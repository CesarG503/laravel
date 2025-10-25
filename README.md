# Archivos docker proporcionados en el parcial

## primero montar el servidor 

- docker compose up -d --build

## Ingresamos a la consola interactiva de laravel 

- Docker exec -it laravel_app bash

## creamos el proyecto de laravel

- composer create-project  laravel/laravel  practica1

## para crear componentes y controladores > ingresar a la carpeta del proyecto

- cd 

### controlador 

-php artisan make:controller IndexController

Nota: solo se crea un controlador en app 

# Crear una vista nueva

creamos la vista en resources/views:

index.blade.php (extencion de las vista es: .blade.php)

## creamos la ruta de la vista

entramos en el archivo routes/web.php y agregamos otro endpoint

Nota: agregamos la logia del endpoint en el controlador y en web lo usamos con use App\...

forma #1 

Route::get('/inicio', [MainController::class,'inicio']);

forma #2 

Route::controller(MainController::class)->group(function()
{
    Route::get('/inicio','inicio')->name('inicio');

});

## `##`<hr>`##`

## Creamos la plantilla inicial 

Estructura basica html y si necesitamos una cdn en el header y en footer.
reserbamos los lugar en la plantilla base con @yeild

Ejemplo:

@yeild('titulo','Documento')

<header>
    @yield('header')
</header>
<div>
    @yield('content')
</div>
<section>
    @yield('section')
</section>
<footer>
    @yield('footer')
</footer>

## Usar como base la plantilla creada: @extends()

@extends('layout.base')

## llenar los apartados de la pltantilla que creamos y usamos

@section('titulo', 'INICIO')

@section('header')

`<h1>`BIENVENIDOS`</h1>`

@endsection

### componente con clase

- php artisan make:component alert

Nota: al crear el componenete se crea el controlador del componente, y la vista del componente

## editar y manipular los componentes 

- en el controlador difinimos la variables que necesitara el componenete

- en la vista creamos el componente y podemos usar las variables definidas en la clase

{{$slot}} = predeterminado para introducion informacion, html, y otros componentes

{{$personalizada}} = area para colocar informacion, html y otros componentes personalizada

## acceder y usar el componente

- llamamos el compoenente: `<x-nombre_del_componente > INFO </x-nombre_del_componente >`
- para introduccion informacion en los demas espacios: `<x-slot:personalizado></x-slot:personalizado>`