@extends('plantilla')
@section('titulo','GameShop - Usuarios')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main id="userlistContainer" class=" container p-5 d-flex flex-column">
        <a href="{{route('cear_usuario')}}" class="btn btn-warning align-self-center w-50 mb-3 fw-bold">Añadir Usuario</a>
        @foreach ($usuarios as $usuario)
            <div class=" bg-dark row m-2 mb-4 p-3 column-gap-4 shadow">
                <div class="col-7">
                    <h1 class=" fs-3 text-warning">{{$usuario->nombre}}</h1>
                    <h2 class=" fs-5 text-white-50">{{$usuario->email}}</h2>
                </div>

                <a class="btn btn-success col align-self-center" href="{{route('ver_usuario',$usuario->id)}}">Modificar</a>

                <form method="POST" class="col align-self-center p-0 m-0" action="{{route('eliminar_usuario',$usuario->id)}}">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger align-self-center w-100" type="submit" name="enviar" value="Eliminar">
                </form>

            </div>
        @endforeach
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
