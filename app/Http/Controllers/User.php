<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = ModelsUser::get();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
        ]);

        $usuario = new ModelsUser();
        $usuario->nombre = $request->get('nombre');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        if($request->get('admin') == null){
            $usuario->admin = false;
        }else{
            $usuario->admin = true;
        }
        $usuario->save();
        return redirect()->route('listado_usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = ModelsUser::findOrFail($id);
        return view('usuarios.update', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:users,email,' . $id,
            'password' => 'nullable'
        ]);

        $usuario = ModelsUser::findOrFail($id);
        $usuario->nombre = $request->get('nombre');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('email');
        $usuario->password = $request->password ? bcrypt($request->get('password')) : $usuario->password;
        if($request->get('admin') == null){
            $usuario->admin = false;
        }else{
            $usuario->admin = true;
        }
        $usuario->save();
        return redirect()->route('listado_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = ModelsUser::findOrFail($id);
        $usuario->delete();
        return redirect()->route('listado_usuarios');
    }
}
