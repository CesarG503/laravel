# Validaciones y propiedades laravel

## $request->validate() validaciones de campos

dentro de la funcion se coloca un array asociativo
["name" => ["rules"]]

```php

'required'     // El campo es obligatorio
'string'       // Debe ser texto
'integer'      // Debe ser un número entero
'numeric'      // Puede ser decimal o entero
'boolean'      // true o false
'date'         // Fecha válida
'email'        // Formato de correo válido
'url'          // Formato de URL válido
```

```php
'max:255'          // Longitud máxima
'min:3'            // Longitud mínima
'size:8'           // Debe tener exactamente 8 caracteres
'between:3,10'     // Entre 3 y 10 caracteres o valores
```

```php
'unique:users,email'   // El email debe ser único en la tabla users
'exists:empresas,id'   // Debe existir en la tabla empresas, campo id

```

# Validaciones con regex

['nombre' = > 'regex: /^[Az-Za\s]+$/']

## para validar dos contraseñas 
crear dos names en formularios con estos nombres
1
- password
- password_confirmation
```php
'password' => 'required|min:8|confirmed',
```

- leer si hay errores con: $errors->any()
- listarlos con: $errors->all()

```html

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

```



# Propiedades de laravel
```php
$empleados->isEmpty()
$empleados->isNotEmpty()
$empleados->count()
$empleados->random()

//ordenamiento

->sortBy('nombre') 
->sortByDesc()

->where('campo','condicion', 'valor')

->where('nombre', 'like', "%{$busqueda}%")->orWhere('apellido', 'like', "%{$busqueda}%")

```
## para hacer la busqueda se necesasita 

```php
$estudiantes = Estudiantes::query();

$estudiantes = $estudiantes->get();
```
```php
    public function index(Request $request)
    {
        $estudiantes = Estudiantes::query();

        $materias = Materias::all();

        if(isset($request->busqueda))
            {
                $estudiantes->where($request->opcion , 'like', "%{$request->busqueda}%");
            }
        
        $estudiantes = $estudiantes->get();
        
        return view('index', compact('estudiantes', 'materias'));
    }

```


# Ordenar los registros antes de mandarlos

```php
//Ordenar alfabeticamente antes de mandarlo
$estudiantes = Estudiantes::all()->sortBy('nombre');
```
```php
//Ordenarlo de forma descendente
$estudiantes = Estudiantes::all()->sortByDesc('nombre');
```

### mantener datos en formulario con 


```html
value = "{{old('nombre')}}"
```


->unique();

onDelete('cascade');