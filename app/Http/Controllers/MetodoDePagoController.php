<?php

namespace App\Http\Controllers;

use App\Models\MetodoDePago;
use Illuminate\Http\Request;

class MetodoDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function validarForm(Request $request)
    {
        $request->validate(
            [
                "nombre" => "required|string|min:3|max:200",
                "descripcion" => "required|string|max:200"
            ]
        );
    }
    
    public function index(Request $request)
    {
        session()->flashInput($request->input());
        $metodosDePago = MetodoDePago::where('nombre', 'like', "%$request->nombre%")->Where('descripcion', 'like', "%$request->descripcion%")->paginate(6);
        //$metodosDePago = MetodoDePago::all();
        return view("metodoDePago.index", ["metodosDePago" => $metodosDePago]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("metodoDePago.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        MetodoDePago::create($request->all());
        return redirect()->route("metodosDePagos.index")->with(["mensaje" => "Metodo de pago creado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodoDePago $metodoDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metodoDePago = MetodoDePago::find($id);
        return view("metodoDePago.edit", ["metodoDePago" => $metodoDePago]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $metodoDePago = MetodoDePago::find($id);
        $metodoDePago->update($request->all());
        return redirect()->route("metodosDePagos.index")->with(["mensaje" => "Metodo de pago editado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $metodoDePago = MetodoDePago::find($id);
        $metodoDePago->delete();
        return redirect()->route("metodosDePagos.index")->with(["mensaje" => "Metodo de pago eliminado"]);
    }
}
