@extends('plantilla')
@section('titulo','GameShop - Carro')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main class="row">
        @if ($total != 0)
        <section class=" col-8 p-3">
            @foreach ($lineas as $linea)
                <div class=" lineContainer row bg-dark m-3 shadow text-white p-3 align-items-center">
                    <div class=" col-1 shadow" style="background-image: url({{$linea->foto}})"></div>
                    <h1 class=" col-4 text-warning">{{$linea->nombre}}</h1>
                    <h3 class=" col-2 text-success fw-bold">{{$linea->precio * $linea->cantidad}} €</h3>

                    <div class="col d-flex align-items-center">
                        <form class=" input-group" action="{{route('actualizar_carro')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="idCarro" id="idCarro" value="{{$linea->id}}">
                            <input class=" input-group-text shadow" type="number" name="cantidad" id="cantidad" min="1" value="{{$linea->cantidad}}">
                            <input class=" btn btn-success shadow" type="submit" value="Actualizar">
                        </form>
                        <form action="{{route('borrar_linea',$linea->idProducto)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger shadow" type="submit" value="Eliminar">
                        </form>
                    </div>
                </div>
            @endforeach
            </section>
            <section id="cartSection" class=" col bg-dark m-4 text-center text-white p-3 shadow">
                <h1 class=" text-warning">Tu Carro</h1>
                <hr>
                <div class="d-flex">
                    <h2 class="w-50">Total:</h2>
                    <h2 class="w-50 text-success fw-bold">{{$total}} €</h2>
                </div>
                <hr>
                <form class=" input-group" action="{{route('crear_pedido')}}" method="POST">
                    @csrf
                    <input class="btn input-group-text btn-success w-25 ms-auto" type="submit" value="Confirmar Pedido">
                    <a class="btn input-group-text btn-warning w-25 me-auto" href="{{route('listado_juegos')}}">Seguir Comprando</a>
                </form>
            </section>
        @else
            <section class="text-center my-5 p-5">
                <h1 class=" text-warning">Tu Carro esta vacio!</h1>
                <a class="btn btn-success w-25 me-auto" href="{{route('listado_juegos')}}">Ver Listado</a>
            </section>
        @endif

    </main>

@endsection

@section('footer')
    @extends('partials.footer')
@endsection
