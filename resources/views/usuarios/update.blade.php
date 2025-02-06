@extends('plantilla')
@section('titulo', 'GameShop - Actualizar Usuarios')
@section('header')
    @extends('partials.header')
@endsection

@section('contenido')
    <main class=" container p-5 d-flex flex-column text-center">
        <h1 class=" text-warning">{{ $usuario->nombre }}</h1>
        <form id="createForm" action="{{ route('actualizar_usuario',$usuario->id) }}" class=" bg-dark p-5 text-white shadow" method="POST">
            @csrf
            @method('PUT')
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control" required name="nombre" id="nombre" placeholder="Nuevo Nombre"
                    value="{{ $usuario->nombre }}">
            </div>
            <hr class=" w-75 text-black mx-auto">
            <div class="form-group">
                <input type="text" class="form-control" required name="apellidos" id="apellidos"
                    placeholder="Nuevos Apellidos" value="{{ $usuario->apellidos }}">
            </div>
            <hr class=" w-75 text-black mx-auto">
            <div class="form-group">
                <input type="email" class="form-control" required name="email" id="email" placeholder="Nuevo Email"
                    value="{{ $usuario->email }}">
            </div>
            <hr class=" w-75 text-black mx-auto">
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
            </div>
            <hr class=" w-75 text-black mx-auto">
            <div class="form-group form-switch">
                <input type="checkbox" name="admin" id="admin" @if ($usuario->admin) checked @endif
                    class=" form-check-input">
                <label class=" mx-2 fw-bold form-label" for="admin">Admin</label>
            </div>
            <hr class=" w-75 text-black mx-auto">
            <input type="submit" name="enviar" value="Actualizar" class="btn btn-warning fw-bold w-25">
        </form>
    </main>
@endsection

@section('footer')
    @extends('partials.footer')
@endsection
