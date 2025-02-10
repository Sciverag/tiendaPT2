@extends('plantilla')
@section('titulo','GameShop - Listado')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main id="mainPedido" class=" container d-flex flex-column justify-content-center align-items-center text-white bg-dark my-5 text-center p-5 shadow">
        <h1 class=" text-warning mb-5">Pedido Realizado</h1>
        <p class=" text-dark-emphasis fs-5">{{$fecha}}</p>
        <hr class="w-100">
        <div class=" text-start w-100">
            @foreach ($lineas as $linea)
                <div class=" fs-2 d-flex">
                    {{$linea->nlinea}}. {{$linea->nombre}}
                    <p class="ms-4 text-white-50">x{{$linea->cantidad}}</p>
                    <p class="ms-auto text-success fw-bold">{{$linea->precio * $linea->cantidad}}€</p>
                </div>
            @endforeach
        </div>
        <hr class="mb-5 w-100">
        <a class="btn btn-success w-25 m-auto" href="{{route('listado_juegos')}}">Seguir Comprando</a>
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
