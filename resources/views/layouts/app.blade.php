<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tienda Shalom</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="25.000000pt" viewBox="0 0 225.000000 225.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,225.000000) scale(0.100000,-0.100000)" fill="#002b5f" stroke="none">
                            <path d="M965 2245 c-5 -1 -37 -8 -70 -15 -87 -18 -167 -46 -274 -96 -201 -94
                                -335 -223 -455 -439 -103 -185 -168 -402 -165 -548 l2 -62 9 65 c4 36 13 99
                                19 140 36 250 181 503 383 667 170 140 332 213 546 248 618 99 1197 -349 1271
                                -985 6 -57 9 -137 6 -179 -5 -66 -4 -70 4 -31 23 104 -10 368 -65 513 -62 166
                                -173 336 -283 438 -123 112 -355 239 -483 264 -19 3 -55 10 -80 15 -41 8 -342
                                12 -365 5z" />
                            <path d="M897 2170 c-100 -22 -247 -78 -321 -123 -229 -139 -403 -353 -480
                                -593 -148 -455 3 -937 379 -1217 204 -152 443 -225 695 -214 216 10 367 58
                                550 175 249 160 419 415 476 719 22 117 14 343 -15 455 -109 416 -425 715
                                -849 803 -105 22 -322 19 -435 -5z m402 -130 c381 -115 540 -560 318 -888
                                -210 -309 -638 -350 -901 -86 -113 113 -170 249 -170 409 0 161 46 280 155
                                399 89 97 208 164 332 185 69 13 191 4 266 -19z m584 -1482 l-38 -38 -45 118
                                -45 117 -2 -160 -3 -160 -32 -27 c-17 -15 -35 -25 -40 -22 -4 3 -8 135 -8 294
                                l0 289 33 30 c17 17 37 31 42 31 6 0 23 -35 38 -77 15 -43 36 -96 47 -118 l18
                                -40 1 167 1 167 33 36 32 35 3 -302 2 -302 -37 -38z m-1470 543 c18 -16 45
                                -51 59 -78 28 -51 57 -168 45 -180 -16 -15 -61 35 -77 86 -20 59 -33 77 -49
                                67 -22 -14 -9 -55 45 -142 74 -116 94 -176 94 -277 0 -133 -41 -170 -116 -105
                                -47 41 -89 130 -104 219 -16 94 -13 103 27 70 25 -21 35 -40 43 -81 19 -99 70
                                -140 70 -57 0 32 -9 59 -36 103 -80 132 -104 199 -104 296 0 108 37 136 103
                                79z m227 -290 l0 -106 40 -22 c21 -13 43 -23 47 -23 4 0 7 45 5 100 -2 55 0
                                100 4 100 4 0 24 -5 45 -12 l39 -11 0 -304 c0 -185 -4 -303 -10 -303 -15 0
                                -64 24 -72 35 -4 5 -8 63 -8 127 l0 118 -40 20 c-21 11 -42 20 -45 20 -3 0 -5
                                -54 -5 -120 l0 -120 -40 26 -40 27 0 303 0 304 40 -26 40 -27 0 -106z m959 63
                                c33 -42 44 -119 39 -265 -7 -171 -30 -250 -92 -314 -54 -57 -91 -61 -130 -14
                                -37 44 -41 66 -41 239 0 168 12 225 61 303 48 74 126 99 163 51z m-578 -93 c4
                                -3 28 -134 54 -291 25 -157 49 -293 51 -302 5 -15 -2 -18 -39 -18 -42 0 -45 2
                                -51 31 -3 17 -6 42 -6 55 0 17 -6 24 -19 24 -10 0 -32 3 -49 6 -30 6 -31 5
                                -37 -40 -8 -49 -14 -52 -63 -35 -25 9 -31 15 -27 32 2 12 18 101 35 197 17 96
                                38 217 47 267 l17 93 40 -6 c23 -4 44 -9 47 -13z m202 -159 c-1 -89 1 -192 4
                                -228 6 -60 8 -65 27 -60 12 3 40 8 64 12 l42 7 0 -71 c0 -57 -3 -71 -17 -77
                                -19 -7 -170 -35 -190 -35 -10 0 -13 68 -13 304 l0 305 23 4 c64 13 62 18 60
                                -161z" />
                            <path d="M1104 2029 c-29 -32 -172 -123 -239 -153 -33 -14 -91 -37 -130 -49
                                l-70 -24 4 -72 c12 -281 157 -575 375 -763 43 -37 82 -68 86 -68 17 0 161 133
                                209 194 108 136 195 312 230 471 14 62 29 223 21 233 -3 4 -36 18 -75 31 -106
                                36 -239 105 -308 159 -84 65 -82 64 -103 41z m125 -229 c44 -22 79 -72 88
                                -126 7 -45 -4 -54 -73 -54 -49 0 -51 1 -60 32 -7 22 -19 36 -37 42 -39 14 -62
                                -3 -62 -45 0 -32 3 -34 75 -64 101 -42 127 -61 153 -109 16 -31 21 -58 21
                                -111 0 -90 -27 -150 -85 -191 -36 -25 -51 -29 -108 -29 -76 1 -131 23 -161 65
                                -21 30 -56 148 -46 157 3 4 34 6 68 7 61 1 63 0 66 -26 2 -14 14 -38 27 -52
                                45 -49 105 -23 105 45 0 44 -14 56 -99 90 -103 41 -151 104 -151 201 0 85 46
                                157 115 180 43 14 126 8 164 -12z" />
                            <path d="M1485 727 c-26 -41 -35 -87 -34 -182 1 -117 8 -139 41 -143 44 -5 61
                                41 65 178 4 121 -5 162 -39 168 -9 2 -24 -8 -33 -21z" />
                        </g>
                    </svg>
                    Tienda Shalom
                </a>
                <a class="navbar-brand" href="{{ url('/productos') }}">Productos</a>
                <a class="navbar-brand" href="{{ url('/categorias') }}">Categorias</a>
                <a class="navbar-brand" href="{{ url('/pedidos') }}">Pedidos</a>
                <a class="navbar-brand" href="{{ url('/metodosDePago') }}">Metodos de Pago</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>