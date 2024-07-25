@extends("layouts.app")

@section("content")

<div class="container">
    <div class="card">
        <div class="card-header">
            Editar Pedido
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
            <form action='{{route("pedidos.update",[$pedido])}}' method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" name="cantidad" id="cantidad" value='{{old("cantidad",$pedido->cantidad)}}' class="form-control">
                </div>
                <input type="hidden" name="user_id" value="{{$pedido->user_id}}">
                <div class="mb-3">
                    <label for="producto_id" class="form-label">Producto</label>
                    <select name="producto_id" id="producto_id" class="form-select">
                        @foreach($productos as $producto)
                        <option value="{{$producto->id}}" {{$producto->id==old("producto_id",$pedido->producto_id)?"selected":""}}>
                            {{$producto->nombre}}
                        </option>
                        @endforeach
                    </select>
                    <label for="metodo_de_pago_id" class="form-label">Metodo de pago</label>
                    <select name="metodo_de_pago_id" id="metodo_de_pago_id" class="form-select">
                        @foreach($metodosDePago as $metodoDePago)
                        <option value="{{$metodoDePago->id}}" {{$metodoDePago->id==old("metodo_de_pago_id",$pedido->metodo_de_pago_id)?"selected":""}}>
                            {{$metodoDePago->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-info">Guardar</button>
                    <a href='{{route("pedidos.index")}}' class="btn btn-outline-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection