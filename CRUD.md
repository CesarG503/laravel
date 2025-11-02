# CRUD de los modelos 


Luego de crear y configurar los modelos, migraciones, factory, seeder y crear datos en las tablas.

Creamos el controlador --resource para controlar el CRUD y las vista

## 1 crear el controlador tipo resource
```bash
php artisan make:controller EmpleadosController --resource

```
## 2 crear el controlador tipo resource basa en el mopdelo que va controlar

```bash
php artisan make:controller ProductoController --resource --model=Producto
```

Ahora configuramos la ruta en archivo `web.php`

```php
Route::resource('empleados', EmpleadosController::class);
```
esto nos crea todos las rutas necesarias que vamos a usar:

### LEER, GUARDAR, BORRAR
```php
Ruta                tipo       funcion

/empleados          GET        index()
/empleados          POST       store()
/empleados/{id}     DELETE     destroy()

```
### Editar

```php
Ruta                      Tipo        funcion

/productos/{id}/edit      GET         edit()
/empleados/{id}           PUT/PATCH   update()

```

### Rutas formularios de creacion, y mostrar un registro
```
Ruta                Tipo    funcion

/productos/{id}     GET     show()
/productos/create   GET     create()

```

# Formularios

```html
<form action="{{route('empleados.update' , $empleado->id) }}" method="POST">
```

dentro de la funcion route colocamos la ruta divida en punto

- empleados.index
- empleados.store
- empleados.destroy
- empleados.update

```go

- Nota: si necesita parametro lo pasamos por el route por ejemplo el ID

- Nota: sin el tipo es DELETE o PUT entonces colocar el metodo en POST y especificar dentro del formulario con `@method("DELETE")`

- Nota: colocar `@csrf` en los formularios

```

## redireccionar o ejecutar un metodo con `<a>`

```html

<a href="{{ route('empleados.edit' , $empleado->id) }}">Editar</a>
```

Funciona para metodos Get


# Logica dentro de las funciones CRUD

### INDEX()
Mandar los datos a la vista directamente

```php

public function index(Request $request){
    $empleados = Empleados::all();
    $empresas = Empresas::all();

    return view('index', ["empleados"=> $empleados, "empresas" => $empresas]);
}
```

### Store()
Creamos un nuevo empleado logica:

- primero validar 
- de la clase directamente usamos la funcion create, luego le pasamo el arreglo
- y redirigimos a index

```php 
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'empresa_id' => 'required|exists:empresas,id',
            ]);
        //$request->validate(['nombre' => 'required', 'empresa_id' => 'required']);
        Empleados::create(['nombre' => $request->nombre, 'empresa_id' => $request->empresa_id]);
        
        return redirect()->route('empleados.index')
                     ->with('success', 'Empleado creado correctamente.');
    }

```

### destroy()
Eliminamos el usuario Logica:

- Eliminamos
- Redirigimos
```php 

    public function destroy(string $id)
    {
        Empleados::destroy($id);
        return redirect()->route('empleados.index')->with(["success"=> 'Se borro corectamente']);
    }
```

### update()
Actualizamos un objeto le pasomos el objeto desde la visa solo mandando el id:

- validamos
- usamos el metodo update del objeto
- redirigimos
```php 

    public function update(Request $request, Empleados $empleado)
    {
        $request->validate(['nombre'=>'required', 'empresa_id'=> 'required']);

        $empleado->update([
            'nombre'=> $request->nombre,
            'empresa_id' => $request->empresa_id
        ]);

        return redirect()->route('empleados.index')->with(['success' => 'actualizado correctamente']);
        
    }

```

### edit()

usamos para activar el formulario de edicion logica,
- mandamos todos los datos como index, y le agreamos el dato del empleado que se esta editando

Nota: misma logica para solo seleccionar un solo usario 

```php 
    public function edit(Empleados $empleado)
    {
        $empleados = Empleados::all();
        $empresas = Empresas::all();

        return view('index', ["empleados"=> $empleados, "empresas" => $empresas, "empleado"=> $empleado]);
    }


```

## Manejo de error y alertas

```php
return redirect()->route('empleados.index')->with(['success' => 'actualizado correctamente']);
```

aqui estamos mandando un mensaje a la vista con la variable success.

para leerlo tenemos que hacerlo por medio de un session.

```php

@isset(session('success'))

<h1> {{session('success')}}</h1>

@endisset

```
#### Con alerta
```php
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
```

## Manejo de errores en los input

los errores se manejan de la siguiente forma:

```php

@error('nombre') // <--- aqui va el name con el que lo mandamos
// colocamos que error dio 
@enderror

```