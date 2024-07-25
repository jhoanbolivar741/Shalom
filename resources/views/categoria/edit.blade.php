@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar Categoria
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
                <form action='{{route("categorias.update",[$categoria])}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value='{{old("nombre",$categoria->nombre)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" value='{{old("descripcion",$categoria->descripcion)}}' class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-info">Guardar</button>
                        <a href='{{route("categorias.index")}}' class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection