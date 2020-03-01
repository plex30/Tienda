<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}">
    <title>@yield('titulo')</title>
</head>
<body style="background-color:#f1eeff">
    <h3 class="text-center mt-4 mb-5 mr-5 ml-5" style="font-weight:bolder; text-shadow:
    -2px -2px 0 #ffffff; color:gray">@yield('cabecera')</h3>
    <div class="container mt-3">
        @yield('contenido')
    </div>
</body>
</html>
