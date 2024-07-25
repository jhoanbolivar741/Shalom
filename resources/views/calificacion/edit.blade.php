@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar Calificacion
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
                <form action='{{route("calificaciones.update",[$calificacion])}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <input type="text" name="comentario" id="comentario" value='{{old("comentario",$calificacion->comentario)}}' class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificacion</label>
                        <input type="text" name="calificacion" id="calificacion" value='{{old("calificacion",$calificacion->calificacion)}}' class="form-control">
                    </div>
                    <input type="hidden" name="producto_id" value="{{$calificacion->producto_id}}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-info">Guardar</button>
                        <a href='{{route("productos.show", $calificacion->producto_id)}}' class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection