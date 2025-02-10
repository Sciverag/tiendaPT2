<nav id="navMenu" class="nav d-flex justify-content-around align-items-center bg-dark fs-4 position-sticky top-0 z-1">
    @if (auth()->check())
        <a href="{{ route('listado_juegos') }}#">Inicio</a>
        <a href="{{ route('listado_juegos') }}#productos">Productos</a>
        @if (auth()->user()->admin)
            <a href="{{route('listado_usuarios')}}">Usuarios</a>
        @endif
        <a id="carroButton" href="{{ route('listado_carro') }}">Carro
            @if ($cantidadLineas != 0)
            <p>{{$cantidadLineas}}</p>
            @endif
        </a>
    @endif
</nav>
