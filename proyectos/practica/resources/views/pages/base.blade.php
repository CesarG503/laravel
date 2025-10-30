<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo','Documento')</title>
</head>
<body>

<div class="header">
    @yield('header')
</div>

<div class="container">
    <div class="section">
        @yield('section')
    </div>
</div>
<footer>
    @yield('footer')
</footer>
</body>
</html>