@extends("layouts.app")

@section("content")

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Categorias
        </div>
        <div class="card-body">
            @if(session("mensaje"))
            <div>{{session("mensaje")}}</div>
            @endif
            <form action="{{route('categorias.index')}}" method='get'>
                <label for="nombre" class="form-label">Nombre</label>
                <input class="form-control w-25 d-inline" type="text" name='nombre' value="{{old('nombre')}}">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input class="form-control w-25 d-inline" type="text" name='descripcion' value="{{old('descripcion')}}">
                <button type="submit" class="btn btn-outline-dark">Buscar</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>
                                @can ('categoria.create')
                                <a href='{{route("categorias.create")}}' class="btn btn-outline-info">Nuevo</a>
                                @endcan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                            <td>
                                @can ('categoria.edit')
                                <a href='{{route("categorias.edit", $categoria)}}' class="btn btn-outline-primary">
                                    Editar
                                </a>
                                @endcan
                                @can ('categoria.destroy')
                                <form action='{{route("categorias.destroy", $categoria)}}' method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categorias->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection