@extends("layouts.app")

@section("content")

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Metodos de Pago
        </div>
        <div class="card-body">
            @if(session("mensaje"))
            <div>{{session("mensaje")}}</div>
            @endif
            <form action="{{route('metodosDePago.index')}}" method='get'>
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
                                <a href='{{route("metodosDePago.create")}}' class="btn btn-outline-info">Nuevo</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($metodosDePago as $metodoDePago)
                        <tr>
                            <td>{{$metodoDePago->id}}</td>
                            <td>{{$metodoDePago->nombre}}</td>
                            <td>{{$metodoDePago->descripcion}}</td>
                            <td>
                                <a href='{{route("metodosDePago.edit", $metodoDePago)}}' class="btn btn-outline-primary">
                                    Editar
                                </a>
                                <form action='{{route("metodosDePago.destroy", $metodoDePago)}}' method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$metodosDePago->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection