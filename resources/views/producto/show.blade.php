@extends("layouts.app")

@section("content")
<div class="d-flex justify-content-center">
    <!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:2837059793. -->
    <div class="row text-center w-100">
        <div class="col-6">
            <div class="card w-100">
                <div class="d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" color="#000000" fill="none">
                        <path d="M12 22C11.1818 22 10.4002 21.6698 8.83693 21.0095C4.94564 19.3657 3 18.5438 3 17.1613C3 16.7742 3 10.0645 3 7M12 22C12.8182 22 13.5998 21.6698 15.1631 21.0095C19.0544 19.3657 21 18.5438 21 17.1613V7M12 22L12 11.3548" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8.32592 9.69138L5.40472 8.27785C3.80157 7.5021 3 7.11423 3 6.5C3 5.88577 3.80157 5.4979 5.40472 4.72215L8.32592 3.30862C10.1288 2.43621 11.0303 2 12 2C12.9697 2 13.8712 2.4362 15.6741 3.30862L18.5953 4.72215C20.1984 5.4979 21 5.88577 21 6.5C21 7.11423 20.1984 7.5021 18.5953 8.27785L15.6741 9.69138C13.8712 10.5638 12.9697 11 12 11C11.0303 11 10.1288 10.5638 8.32592 9.69138Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 12L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 4L7 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$producto->nombre}}</h5>
                    <p class="card-text">{{$producto->descripcion}}</p>
                    <p class="card-text">Precio: {{$producto->precio}}</p>
                    <p class="card-text">Stock: {{$producto->stock}}</p>
                    <form action='{{route("pedidos.store")}}' method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="text" name="cantidad" id="cantidad" class="form-control">
                        </div>
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <input type="hidden" name="producto_id" value="{{$producto->id}}">

                        <div class="mb-3">
                            <label for="metodo_de_pago_id" class="form-label">Metodo de Pago</label>
                            <select name="metodo_de_pago_id" id="metodo_de_pago_id" class="form-select">
                                @foreach($metodosDePago as $metodoDePago)
                                <option value="{{$metodoDePago->id}}" {{$metodoDePago->id==old("metodo_de_pago_id")?"selected":""}}>
                                    {{$metodoDePago->nombre}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Comprar</button>
                    </form>
                    <a href='{{route("productos.index")}}' class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Agrega Un Comentario
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
                    <form action='{{route("calificaciones.store")}}' method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario</label>
                            <input type="text" name="comentario" id="comentario" value='{{old("comentario")}}' class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="calificacion" class="form-label">Calificacion</label>
                            <input type="text" name="calificacion" id="calificacion" value='{{old("calificacion")}}' class="form-control">
                        </div>
                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Calificaciones
                </div>
                <div class="card-body">
                    @if(session("mensaje"))
                    <div>{{session("mensaje")}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Comentario</th>
                                    <th>Calificacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calificaciones as $calificacion)
                                <tr>
                                    <td>{{$calificacion->id}}</td>
                                    <td>{{$calificacion->comentario}}</td>
                                    <td>{{$calificacion->calificacion}}</td>
                                    <td>
                                        <a href='{{route("calificaciones.edit", $calificacion)}}' class="btn btn-outline-primary">
                                            Editar
                                        </a>
                                        <form action='{{route("calificaciones.destroy", $calificacion)}}' method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$calificaciones->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection