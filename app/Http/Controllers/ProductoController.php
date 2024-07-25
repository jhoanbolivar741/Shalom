<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Categoria;
use App\Models\MetodoDePago;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    protected function validarForm(Request $request) {
        $request->validate([
            'nombre' => 'required|string|min:3|max:200',
            'descripcion' => 'required|string|max:200',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|numeric|min:1',
        ]);
    }
    
    public function index(Request $request)
    {
        session()->flashInput($request->input());
        
        if ($request->filled('categoria_id')) {
            if ($request->filled('precio_min') && $request->filled('precio_max')) {
                $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('categoria_id', $request->categoria_id)->whereBetween('precio', [$request->precio_min, $request->precio_max])->paginate(6);
            } elseif ($request->filled('precio_min')) {
                $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('categoria_id', $request->categoria_id)->where('precio', '>=', $request->precio_min)->paginate(6);
            } elseif ($request->filled('precio_max')) {
                $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('categoria_id', $request->categoria_id)->where('precio', '<=', $request->precio_max)->paginate(6);
            } else {
                $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('categoria_id', $request->categoria_id)->paginate(6);
            }
        } else if ($request->filled('precio_min') && $request->filled('precio_max')) {
            $productos = Producto::where('nombre', 'like', "%$request->nombre%")->whereBetween('precio', [$request->precio_min, $request->precio_max])->paginate(6);
        } else if ($request->filled('precio_min')) {
            $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('precio', '>=', $request->precio_min)->paginate(6);
        } else if ($request->filled('precio_max')) {
            $productos = Producto::where('nombre', 'like', "%$request->nombre%")->where('precio', '<=', $request->precio_max)->paginate(6);
        } else {
            $productos = Producto::where('nombre', 'like', "%$request->nombre%")->paginate(6);
        }
        
        $categorias = Categoria::all();
        return view('producto.index',['productos' => $productos, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('producto.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Producto::create($request->all());
        return redirect()->route('productos.index')->with(['mensaje' => 'Producto creado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $calificaciones = Calificacion::where('producto_id', $id)->paginate(2);
        $user_id = Auth::user()->id;
        $metodosDePago = MetodoDePago::all();
        return view('producto.show', ['producto' => $producto, 'categorias' => $categorias, 'calificaciones' => $calificaciones, 'user_id' => $user_id, 'metodosDePago' => $metodosDePago]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('producto.edit', ['producto' => $producto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request);
        $producto = Producto::find($id);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with(['mensaje' => 'Producto editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with(['mensaje' => 'Producto eliminado']);
    }
}
