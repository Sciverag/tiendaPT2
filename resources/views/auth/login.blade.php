@extends('plantilla')
@section('titulo', 'GameShop - Login')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main id="loginMain" class=" container d-flex flex-column align-items-center bg-dark m-auto h-50 w-50 p-5">
        <h1 class=" text-warning mb-5">Login</h1>
        @if (!empty($error))
            <div class="text-danger">
                {{ $error }}
            </div>
        @endif
        <form class=" h-100 w-75 d-flex flex-column justify-content-around" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña"/>
            <input type="submit" name="enviar" value="Iniciar Sesión" class="btn btn-success fw-bold mt-4 align-self-center btn-block w-50">
        </form>
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
