<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Documento')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div>

<img src="{{asset('img/img1.jpg')  }}" alt="">

<div class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-end"> 
        <ul class="navbar-nav">
            <li class="nav-item">
                  <a href="" class="nav-link"> Emlpeados</a> 
            </li>
         

        </ul>
     
    </div>
</div>
@yield('header')
</div>
<div class="container-md">
@yield('section')
</div>
<div>
    @yield('footer')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>   
</body>
</html>