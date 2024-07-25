@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar metodoDePago
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
                <form action='{{route("metodosDePago.update",[$metodoDePago])}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value='{{old("nombre",$metodoDePago->nombre)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" value='{{old("descripcion",$metodoDePago->descripcion)}}' class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        <a href='{{route("metodosDePago.index")}}' class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection