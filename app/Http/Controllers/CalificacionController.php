<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Producto;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function validarForm(Request $request)
    {
        $request->validate([
            "comentario" => "required|string|max:200",
            "calificacion" => "required|numeric|min:1|max:5"
        ]);
    }
    public function index()
    {
        //
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
        Calificacion::create($request->all());
        return redirect()->route("productos.show", $request->producto_id)->with(["mensaje" => "Calificacion agregada"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $calificacion = Calificacion::find($id);
        return view("calificacion.edit", ["calificacion" => $calificacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $calificacion = Calificacion::find($id);
        $calificacion->update($request->all());
        return redirect()->route("productos.show", $calificacion->producto_id)->with(["mensaje" => "Calificacion editada"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->delete();
        return redirect()->route("productos.show", $calificacion->producto_id)->with(["mensaje" => "Calificacion eliminada"]);
    }
}
