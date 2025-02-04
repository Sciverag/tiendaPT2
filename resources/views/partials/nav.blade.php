<nav class="nav d-flex justify-content-around align-items-center bg-dark fs-4 position-sticky top-0 z-1">
    @if (auth()->check())
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('listado_juegos') }}">Productos</a>
        @if (auth()->user()->admin)
            <a href="{{route('listado_usuarios')}}">Usuarios</a>
        @endif
        <a href="{{ route('listado_carro') }}">Carro</a>
    @endif
</nav>
