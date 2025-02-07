@extends('plantilla')
@section('titulo','GameShop - Detalles')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main id="detailsMain" class="row p-5 justify-content-center">

        <img src="{{$juego->foto}}" alt="{{$juego->name}}" class="col-3 h-100 object-fit-cover">
        <div class="col-8 d-flex flex-column bg-dark p-3">
            <h1 class=" border-bottom text-warning p-3">{{$juego->name}}</h1>
            <h5 class="border-bottom text-success fw-bold p-3">{{$juego->precio}}€</h5>
            <p class="text-white fs-3 p-4 my-5">{{$juego->descripcion}}</p>

            <form action="{{route('comprar_juego')}}" method="POST" class=" input-group m-auto">
                @csrf
                <input type="hidden" name="idProducto" id="idProducto" value="{{$juego->id}}">
                <input class=" input-group-text"  type="number" name="cantidad" id="cantidad" value="1" min="1">
                <input class="btn btn-success" type="submit" value="Comprar">
            </form>
        </div>
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
