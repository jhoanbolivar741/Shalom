@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12 text-center my-5">
            <h1 class="display-4 fw-bold" style="color: #2c3e50; font-family: 'Poppins', sans-serif;">Bienvenido a Tienda </h1><br>
            <h1 class="display-4 fw-bold" style="color: blue; font-family: 'Poppins', sans-serif;"> SHALOM </h1>
            <p class="lead" style="color: #7f8c8d; font-family: 'Poppins', sans-serif;">Encuentra todo lo que necesitas aqui</p>
        </div>
        <div class="container text-center">
            <div class="row my-5">
                <div class="col-md-4 mb-4">
                    <div class="card shadow" style="width: 100%; border: none;">
                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" color="#00FFFF" fill="none">
                                <path d="M8 16L16.7201 15.2733C19.4486 15.046 20.0611 14.45 20.3635 11.7289L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M6 6L7.5 6M22 6H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M10.5 7C10.5 7 11.5 7 12.5 9C12.5 9 15.6765 4 18.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="6" cy="20" r="2" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="17" cy="20" r="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M8 20L15 20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M2 2H2.966C3.91068 2 4.73414 2.62459 4.96326 3.51493L7.93852 15.0765C8.08887 15.6608 7.9602 16.2797 7.58824 16.7616L6.63213 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: #34495e; font-family: 'Poppins', sans-serif;">Productos</h5>
                            <p class="card-text" style="color: #95a5a6; font-family: 'Poppins', sans-serif;">Todo nuetro catalogo de productos 😜</p>
                            <a href='{{route("productos.index")}}' class="btn btn-primary" style="background-color: #3498db; border: none;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow" style="width: 100%; border: none;">
                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" color="#FF00FF" fill="none">
                                <rect x="11" y="2" width="11" height="11" rx="2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11 6.50049C8.97247 6.50414 7.91075 6.55392 7.23223 7.23243C6.5 7.96467 6.5 9.14318 6.5 11.5002V12.5002C6.5 14.8572 6.5 16.0357 7.23223 16.768C7.96447 17.5002 9.14298 17.5002 11.5 17.5002H12.5C14.857 17.5002 16.0355 17.5002 16.7678 16.768C17.4463 16.0895 17.4961 15.0277 17.4997 13.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.5 11.0005C4.47247 11.0041 3.41075 11.0539 2.73223 11.7324C2 12.4647 2 13.6432 2 16.0002V17.0002C2 19.3572 2 20.5357 2.73223 21.268C3.46447 22.0002 4.64298 22.0002 7 22.0002H8C10.357 22.0002 11.5355 22.0002 12.2678 21.268C12.9463 20.5895 12.9961 19.5277 12.9997 17.5002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: #34495e; font-family: 'Poppins', sans-serif;">Categorias</h5>
                            <p class="card-text" style="color: #95a5a6; font-family: 'Poppins', sans-serif;">Explora todas la categorias disponibles en stock 😎</p>
                            <a href='{{route("categorias.index")}}' class="btn btn-primary" style="background-color: #3498db; border: none;">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow" style="width: 100%; border: none;">
                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" color="red" fill="none">
                                <path d="M6.29358 4.83499L4.16511 17.6712C3.98586 18.7522 3.89623 19.2927 4.19427 19.6464C4.49231 20 5.03749 20 6.12785 20H6.53027C7.35308 20 7.76448 20 8.04501 19.7555C8.32554 19.5109 8.38372 19.1016 8.50008 18.2828L8.96761 14.9934C9.00457 14.7333 9.02305 14.6033 9.05213 14.492C9.26041 13.6948 9.93391 13.1077 10.7485 13.0132C10.8622 13 10.9929 13 11.2543 13H12.4163C15.5113 13 18.1943 10.8473 18.8803 7.81384C19.5536 4.83576 17.3016 2 14.2631 2H9.62312C8.5093 2 7.95239 2 7.51383 2.2348C7.26304 2.36907 7.04377 2.55577 6.87077 2.78235C6.56824 3.17856 6.47669 3.7307 6.29358 4.83499Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M8.24315 19.4998L8.01451 20.8325C7.90978 21.4429 8.38532 21.9998 9.01128 21.9998H11.0018C11.4961 21.9998 11.9179 21.6464 11.9991 21.1642L12.7285 16.8354C12.8098 16.3533 13.2316 15.9998 13.7258 15.9998H15.5289C18.11 15.9998 20.3448 14.2267 20.9047 11.7345C21.2967 9.99004 20.4437 8.30993 19 7.50098" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: #34495e; font-family: 'Poppins', sans-serif;">Metodos de Pago</h5>
                            <p class="card-text" style="color: #95a5a6; font-family: 'Poppins', sans-serif;">Todas las formas de pagar 😉</p>
                            <a href="{{route('metodosDePago.index')}}" class="btn btn-primary" style="background-color: #3498db; border: none;">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #7f8c8d;
    }

    .card-title {
        font-weight: 600;
    }

    .card-text {
        font-weight: 400;
    }

    .btn-primary {
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }
</style>
@endsection