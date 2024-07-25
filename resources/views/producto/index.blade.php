@extends("layouts.app")

@section("content")

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Productos
        </div>
        <div class="card-body">
            @if(session("mensaje"))
            <div>{{session("mensaje")}}</div>
            @endif
            <form action="{{route('productos.index')}}" method='get'>
                <label for="nombre" class = "form-label">Nombre</label>
                <input class="form-control w-25 d-inline" type="text" name='nombre' value="{{old('nombre')}}">
                <label for="categoria_id" class = "form-label">Categoria</label>
                <select class="form-select w-25 d-inline" name='categoria_id'>
                    <option value="">Ninguna</option>
                    @foreach($categorias as $categoria)
                    <option value='{{$categoria->id}}' {{$categoria->id==old('categoria_id')?'selected':''}}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                <label for="precio_min" class = "form-label">Precio_min</label>
                <input class="form-control w-25 d-inline" type="number" name='precio_min' value="{{old('precio_min')}}">
                <label for="precio_max" class = "form-label">Precio_max</label>
                <input class="form-control w-25 d-inline" type="number" name='precio_max' value="{{old('precio_max')}}">
                <button type="submit" class="btn btn-outline-dark">Buscar</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>
                                <a href='{{route("productos.create")}}' class="btn btn-outline-info">Nuevo</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->precio}} Bs.</td>
                            <td>{{$producto->relCategoria->nombre}}</td>
                            <td>
                                <a href='{{route("productos.show", $producto)}}' class="btn btn-outline-primary">
                                    Ver
                                </a>
                                <a href='{{route("productos.edit", $producto)}}' class="btn btn-outline-warning">
                                    Editar
                                </a>
                                <form action='{{route("productos.destroy", $producto)}}' method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$productos->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection