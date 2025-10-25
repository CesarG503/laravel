# Archivos docker proporcionados en el parcial

## primero montar el servidor 

- docker compose up -d --build

## Ingresamos a la consola interactiva de laravel 

- Docker exec -it laravel_app bash

## creamos el proyecto de laravel

- composer create-project  laravel/laravel  practica1

## para crear componentes y controladores > ingresar a la carpeta del proyecto

- cd 
### componente con clase

- php artisan make:component alert