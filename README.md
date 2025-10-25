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

### componente con clase

- php artisan make:component alert

Nota: al crear el componenete se crea el controlador del componente, y la vista del componente
