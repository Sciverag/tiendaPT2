<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CarroController extends Controller
{
    private const TOKEN = "gYaXBDvQAqkVQDOya9TqNP0ifqLvSNH6stgdMZeak2wVPrOdSWBfzBNHUuHw";

    public function index(){
        $response = Http::withToken(self::TOKEN)->get('http://carrito/api/carros/', [
            "idUsuario" => auth()->user()->id
        ]);
        $lineas = json_decode($response);
        return view('carro.index',compact('lineas'));
    }

    public function store(Request $request){

        $juego = Game::findOrFail($request->idProducto);

        $response = Http::withToken(self::TOKEN)->post('http://carrito/api/carros',[
            "idProducto" => $request->idProducto,
            "nombre" => $juego->name,
            "foto" => $juego->foto,
            "precio" => $juego->precio,
            "idUsuario" => auth()->user()->id,
            "cantidad" => $request->cantidad
        ]);

        if($response->failed()) {
            return back()->with('error', 'Error al añadir al carrito');
        }
        return redirect()->route('listado_carro');
    }
}
