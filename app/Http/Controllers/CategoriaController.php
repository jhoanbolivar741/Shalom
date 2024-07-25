<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("can:categoria.index")->only("index");
        $this->middleware("can:categoria.create")->only("create", "store");
        $this->middleware("can:categoria.edit")->only("edit", "update");
        $this->middleware("can:categoria.destroy")->only("destroy");
    }
    public function validarForm(Request $request)
    {
        $request->validate(
            [
                "nombre" => "required",
                "descripcion" => "required"
            ]
        );
    }

    public function index(Request $request)
    {
        session()->flashInput($request->input());
        $categorias = Categoria::where('nombre', 'like', "%$request->nombre%")->Where('descripcion', 'like', "%$request->descripcion%")->paginate(6);
        //$categorias = Categoria::all();
        return view('categoria.index', ["categorias" => $categorias]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Categoria::create($request->all());
        return redirect()->route("categorias.index")->with(["mensaje" => "Categoria creada"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit', ["categoria" => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with(['mensaje' => 'Categoria editada']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with(['mensaje' => 'Categoria eliminada']);
    }
}
