@extends('plantilla')
@section('titulo','GameShop - Listado')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main id="productos" class="container-flow justify-content-center row p-5 g-2">
        @foreach ($juegos as $juego)
        <div class="card bg-dark text-white mx-1 col-3 shadow" style="width: 18rem;">
            <img src="{{$juego->foto}}" class="card-img-top h-75" alt="{{$juego->name}}">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{$juego->name}}</h5>
              <p class="card-text text-success fw-bold">{{$juego->precio}}€</p>
              <a href="{{route('detalles_juego', $juego->id)}}" class="btn btn-warning w-100 fw-bold">Mas info</a>
            </div>
          </div>
    @endforeach
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
