<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller

{
    private const TOKEN = "gYaXBDvQAqkVQDOya9TqNP0ifqLvSNH6stgdMZeak2wVPrOdSWBfzBNHUuHw";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($idPedido)
    {
        $lineas = Orderline::where('idPedido',$idPedido)->get();
        $pedido = Order::findOrFail($idPedido);
        $fecha = $pedido->fecha;

        return view('pedido.index',compact('lineas','fecha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $pedido = new Order();
        $pedido->fecha = date('Y-m-d');
        $pedido->idUsuario = auth()->user()->id;
        $pedido->save();

        $lineasCarro = json_decode(Http::withToken(self::TOKEN)->get('http://carrito/api/carros/', [
            "idUsuario" => auth()->user()->id
        ]));
        $nlinea = 1;

        foreach($lineasCarro as $linea){
            $lineaPedido = new Orderline();
            $lineaPedido->idPedido = $pedido->id;
            $lineaPedido->nlinea = $nlinea;
            $lineaPedido->idProducto = $linea->idProducto;
            $lineaPedido->nombre = $linea->nombre;
            $lineaPedido->cantidad = $linea->cantidad;
            $lineaPedido->precio = $linea->precio;
            $lineaPedido->save();

            $nlinea++;
        }

        $request = Http::withToken(self::TOKEN)->delete("http://carrito/api/carros/" . auth()->user()->id);

        return redirect()->route('mostrar_pedido',$pedido->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
