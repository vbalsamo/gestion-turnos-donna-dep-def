<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    @yield('contenido_header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    <title>Donna Depilación Definitiva</title>
</head>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: beige;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ asset('logo.png') }}" width="60" height="60" alt="Donna depilación definitiva">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('turnos.index') }}">Turnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('locaciones.index') }}">Sucursales</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="{{ route('tratamientos.index') }}" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Tratamientos
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($tratamientos_global as $tratamiento_global)
                            <li><a class="dropdown-item"
                                   href="{{ route('tratamientos.show', $tratamiento_global->id) }}">{{$tratamiento_global->nombre}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @php
                use \Illuminate\Support\Facades\Auth;
                $cliente = Auth::user();
            @endphp
            <div class="nav-item dropdown">
                @if(isset($cliente))
                    <a class="nav-link dropdown-toggle active" href="{{ route('tratamientos.index') }}" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $cliente->nombre }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item"
                               href="{{ route('menu.index') }}">Volver al menú</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf
                                <a class="dropdown-item font-weight-bold" href="#"
                                   onclick="document.getElementById('logout-form').submit()">Cerrar sesion</a>
                            </form>
                        </li>
                    </ul>
                @else
                    <form action="{{ route('login.index') }}">
                        <button id="btnIngresar" type="submit" class="btn btn-primary shadow">Iniciar Sesión
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</nav>

<body class="d-flex flex-column min-vh-100" style="background: #FAD8D1; margin-top: 86px">
@yield('contenido')


<footer class="mt-auto" style="background-color: #F8EEE2;">
    <div class="container">
        <footer class="row row-cols-2">
            <div class="col-md-10">
                <span class=" text-muted ">UTN FullStack - Grupo 3</span>
            </div>
            <div class="col">
                <span class=" text-muted ">2022</span>
            </div>
        </footer>
    </div>
</footer>
</body>




</html>
