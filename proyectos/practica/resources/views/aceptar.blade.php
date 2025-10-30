@extends('plantilla')

@section('section')

<h1>Vista form</h1>

@if (isset($datos['nombre']))
<p>Nombre es: @php echo $datos['nombre']; @endphp  </p>
<p>Apellido es: @php echo $datos['apellido'] ;@endphp  </p>
@endif


@endsection