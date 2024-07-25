@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar Producto
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action='{{route("productos.update",[$producto])}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value='{{old("nombre",$producto->nombre)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" value='{{old("descripcion",$producto->descripcion)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" id="precio" value='{{old("precio",$producto->precio)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" name="stock" id="stock" value='{{old("stock",$producto->stock)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-select">
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" {{$categoria->id==old("categoria_id",$producto->categoria_id)?"selected":""}}>
                                    {{$categoria->nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-warning">Guardar</button>
                        <a href='{{route("productos.index")}}' class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection