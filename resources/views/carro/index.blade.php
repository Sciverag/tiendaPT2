@extends('plantilla')
@section('titulo','GameShop - Carro')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main class=" container">
        @foreach ($lineas as $linea)
            <div class=" lineContainer row bg-dark my-3 shadow text-white p-3 align-items-center">
                <div class=" col-1 shadow" style="background-image: url({{$linea->foto}})"></div>
                <h1 class=" col-4 text-warning">{{$linea->nombre}}</h1>
                <h3 class=" col-2 text-success fw-bold">{{$linea->precio * $linea->cantidad}} €</h3>

                <div class="col d-flex align-items-center">
                    <form class=" input-group" action="" method="POST">
                        <input class=" input-group-text shadow" type="number" name="cantidad" id="cantidad" min="1" value="{{$linea->cantidad}}">
                        <input class=" btn btn-success shadow" type="submit" value="Actualizar">
                    </form>
                    <form action="">
                        <input class="btn btn-danger shadow" type="submit" value="Eliminar">
                    </form>
                </div>
            </div>
        @endforeach
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
