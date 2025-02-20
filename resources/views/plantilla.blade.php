@php
    if(Auth::check()){
            $id = auth()->user()->id;
            $response = Http::withToken("gYaXBDvQAqkVQDOya9TqNP0ifqLvSNH6stgdMZeak2wVPrOdSWBfzBNHUuHw")->get("http://carrito/api/carros/$id");
            $cantidadLineas = json_decode($response);
        }else{
            $cantidadLineas = 0;
        }
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    @yield('header')
    @include('partials.nav',compact('cantidadLineas'))

    @yield('contenido')

    @yield('footer')
</body>

</html>
