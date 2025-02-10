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
        $total = 0;
        foreach($lineas as $linea){
            $total += ($linea->precio * $linea->cantidad);
        }
        return view('carro.index',compact('lineas', 'total'));
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

    public function update(Request $request){
        $response = Http::withToken(self::TOKEN)->put('http://carrito/api/carros', [
            "id" => $request->idCarro,
            "cantidad" => $request->cantidad
        ]);

        if($response->failed()) {
            return back()->with('error', 'No se a podido actualizar el carrito');
        }

        return redirect()->route('listado_carro');
    }

    public function destroy($idProducto){
        $response = Http::withToken(self::TOKEN)->delete('http://carrito/api/carros', [
            'idUsuario' => auth()->user()->id,
            'idProducto' => $idProducto
        ]);

        if($response->failed()) {
            return back()->with('error', 'No se a podido eliminar la linea del carrito');
        }

        return redirect()->route('listado_carro');
    }
}
