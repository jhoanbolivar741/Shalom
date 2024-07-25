@extends("layouts.app")

@section("content")

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            Pedidos
        </div>
        <div class="card-body">
            @if(session("mensaje"))
            <div>{{session("mensaje")}}</div>
            @endif
            <form action="{{route('pedidos.index')}}" method='get'>
                <label for="producto_id" class="form-label">Producto</label>
                <select class="form-select w-25 d-inline" name='producto_id'>
                    <option value="">Ninguna</option>
                    @foreach($productos as $producto)
                    <option value='{{$producto->id}}' {{$producto->id==old('producto_id')?'selected':''}}>{{$producto->nombre}}</option>
                    @endforeach
                </select>
                <label for="cantidad" class="form-label">Cantidad</label>
                <input class="form-control w-25 d-inline" type="number" name='cantidad' value="{{old('cantidad')}}">
                <label for="metodo_de_pago_id" class = "form-label">Metodo de Pago</label>
                <select class="form-select w-25 d-inline" name='metodo_de_pago_id'>
                    <option value="">Ninguna</option>
                    @foreach($metodosDePago as $metodoDePago)
                    <option value='{{$metodoDePago->id}}' {{$metodoDePago->id==old('metodo_de_pago_id')?'selected':''}}>{{$metodoDePago->nombre}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-dark">Buscar</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Total</th>
                            <th>Metodo de Pago</th>
                            <th>
                                <a href='{{route("productos.index")}}' class="btn btn-outline-info">Seguir Comprando</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->relProducto->nombre}}</td>
                            <td>{{$pedido->cantidad}}</td>
                            <td>{{$pedido->relProducto->precio * $pedido->cantidad}} Bs.</td>
                            <td>{{$pedido->relMetodoDePago->nombre}}</td>
                            <td>
                                <a href='{{route("pedidos.edit", $pedido)}}' class="btn btn-outline-primary">
                                    Editar
                                </a>
                                <form action='{{route("pedidos.destroy", $pedido)}}' method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$pedidos->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>

@endsection