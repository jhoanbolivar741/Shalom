<?php

namespace App\Http\Controllers;

use App\Models\MetodoDePago;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function validarForm(Request $request){
        $request->validate([
            'cantidad' => 'required|numeric|min:1',
            'user_id' => 'required|numeric|min:1',
            'producto_id' => 'required|numeric|min:1',
        ]);
    }
    public function index(Request $request)
    {
        session()->flashInput($request->input());
        //$pedidos = Pedido::where('user_id', auth()->user()->id)->paginate(6);
        //$pedidos = Pedido::where('user_id', auth()->user()->id)->get();
        if ($request->filled('producto_id')) {
            if ($request->filled('cantidad') && $request->filled('metodo_de_pago_id')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('producto_id', $request->producto_id)->where('cantidad', $request->cantidad)->where('metodo_de_pago_id', $request->metodo_de_pago_id)->paginate(6);
            } else if ($request->filled('cantidad')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('producto_id', $request->producto_id)->where('cantidad', $request->cantidad)->paginate(6);
            } else if ($request->filled('metodo_de_pago_id')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('producto_id', $request->producto_id)->where('metodo_de_pago_id', $request->metodo_de_pago_id)->paginate(6);
            } else {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('producto_id', $request->producto_id)->paginate(6);
            }
        } else {
            if ($request->filled('cantidad') && $request->filled('metodo_de_pago_id')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('cantidad', $request->cantidad)->where('metodo_de_pago_id', $request->metodo_de_pago_id)->paginate(6);
            } else if ($request->filled('cantidad')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('cantidad', $request->cantidad)->paginate(6);
            } else if ($request->filled('metodo_de_pago_id')) {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->where('metodo_de_pago_id', $request->metodo_de_pago_id)->paginate(6);
            } else {
                $pedidos = Pedido::where('user_id', auth()->user()->id)->paginate(6);
            }
        }
        $productos = Producto::all();
        $metodosDePago = MetodoDePago::all();
        return view('pedido.index',['pedidos' => $pedidos, 'productos' => $productos, 'metodosDePago' => $metodosDePago]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Pedido::create($request->all());
        if ($request->cantidad > Producto::find($request->producto_id)->stock) {
            return redirect()->route('productos.index')->with(['mensaje' => 'No hay stock suficiente']);
        }
        Producto::find($request->producto_id)->decrement('stock', $request->cantidad);
        return redirect()->route('productos.index')->with(['mensaje' => 'Pedido realizado con exito']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pedido = Pedido::find($id);
        $productos = Producto::all();
        $metodosDePago = MetodoDePago::all();
        return view('pedido.edit', ['pedido' => $pedido, 'productos' => $productos, 'metodosDePago' => $metodosDePago]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $pedido = Pedido::find($id);
        $pedido->update($request->all());
        return redirect()->route('pedidos.index')->with(['mensaje' => 'Pedido editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        return redirect()->route('pedidos.index')->with(['mensaje' => 'Pedido eliminado']);
    }
}
