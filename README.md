# Archivos docker proporcionados en el parcial

## primero montar el servidor 

- `docker compose up -d --build`

## Ingresamos a la consola interactiva de laravel 

- `Docker exec -it laravel_app bash`

## creamos el proyecto de laravel

- `composer create-project  laravel/laravel  practica1`

## para crear componentes y controladores > ingresar a la carpeta del proyecto

- `cd`

### controlador 

- `php artisan make:controller IndexController`

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




{{}} = para inyectar php directamente

## Mandar datos con POST y recibirlos 

colocar esta proteccion dentro del formulario

@csrf `<!-- proteccion contra ataques csrf -->`


En la vista que recibe los datos se hace esto para pasarle las variables y que se puedan usar en esa vista 

public function Aceptar(Request $request)
{
    $datos = $request->all();
    return view('aceptar');
}

$datos = $request->all();

 en las vista ya se usa el arreglo de datos:

- $datos['nombre']
- $datos['apellido']
- $datos['edad']


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

- `php artisan make:component alert`

Nota: al crear el componenete se crea el controlador del componente, y la vista del componente

## editar y manipular los componentes 

- en el controlador difinimos la variables que necesitara el componenete

- en la vista creamos el componente y podemos usar las variables definidas en la clase

{{$slot}} = predeterminado para introducion informacion, html, y otros componentes

{{$personalizada}} = area para colocar informacion, html y otros componentes personalizada

## acceder y usar el componente

- llamamos el compoenente: `<x-nombre_del_componente > INFO </x-nombre_del_componente >`
- para introduccion informacion en los demas espacios: `<x-slot:personalizado></x-slot:personalizado>`



# Base de datos 

## configurar la coneccion

- editar el .env
```cpp
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=proyectosdb (aqui colocamos el nombre de la base)
DB_USERNAME=root
DB_PASSWORD=rootpass
```
## hacer la coneccion comandos

- `php artisan migrate`

Nota: esto crea todos los modelos que tengamos
Nota: si no existe la base nos va preguntar si la queremos crear

- `php artisan make:model Producto -m `
Nota: se crean 2 Archivos: 
    - Modelo
    - Migracion

dentro de la clase del modelo creamos la tabla:

```php
use HasFactory;

protected $table = 'tbl_productos';

protected $fillable = 
    [
        'nombre',
        'precio',
        'cantidad'
    ];
```

dentro de la migracion definmos: 

- nombre de la tabla
- columnas de la tabla + tipo de dato

```php

Schema::create('tbl_productos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre'); 
    $table->decimal('precio');
    $table->integer('cantidad');
    $table->timestamps();
});

```


- `php artisan make:factory ProductoFactory --model=Producto`

```php
 return [
        'nombre' => fake()->name(),
        'precio'=> fake()->numberBetween(10,20),
        'cantidad' => fake()->numberBetween(10,20)

    ];
```
Nota: definimos las reglas como se van a crear los registros

- `php artisan make:seeder ProductoSeeder`

en el archivo seeder agregar la clase:
```php 
use App\Models\Producto 
```

en el archivo seeder agregar una semilla creadora de datos falsos, dentro de la funcion RUN

```php
Producto::factory()->count(50)->create();
```

# finalmente ejecutamos para crear todos los registros


- `php artisan db:seed --class=ProductoSeeder`

- `php artisan migrate` : si hay error actualizar las migraciones
