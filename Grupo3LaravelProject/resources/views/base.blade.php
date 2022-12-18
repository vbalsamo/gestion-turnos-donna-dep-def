<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    @yield('contenido_header')
    <title>Donna Depilación Definitiva</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F8EEE2">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ asset('logo.png') }}" width="60" height="60" alt="Donna depilación definitiva">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('calendarioSelect.index') }}">Turnos<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('locaciones.index') }}">Sucursales</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="{{ route('tratamientos.index') }}"
                       id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tratamientos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($tratamientos_global as $tratamiento_global)
                            <a class="dropdown-item"
                               href="{{ route('tratamientos.show', $tratamiento_global->id) }}">{{$tratamiento_global->nombre}}</a>
                        @endforeach
                        <a class="dropdown-item font-weight-bold" href="{{ route('tratamientos.index') }}">Ver todos</a>
                    </div>
                </li>
                @php
                    use \Illuminate\Support\Facades\Auth;
                    $cliente = Auth::user();
                @endphp
                @if(isset($cliente))
                    <li class="nav-item dropdown active my-2" style="position: relative; left: 190%;">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $cliente->nombre }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{--<! cambiar links y agregar if para usr comun y usr admin>--}}
                            <a class="dropdown-item font-weight-bold" href="{{ route('menu.index') }}">Volver al
                                menu</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf
                                <a class="dropdown-item font-weight-bold" href="#"
                                   onclick="document.getElementById('logout-form').submit()">Cerrar sesion</a>
                            </form>

                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown active" style="position: relative; left: 190%;">
                        <form action="{{ route('login.index') }}">
                            <button id="btnIngresar" type="submit" class="btn btn-primary shadow">Iniciar Sesión
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<body style="background: #FAD8D1;">
@yield('contenido')

</body>

<footer class="fixed-bottom" style="background-color: #F8EEE2; height: 30px;">
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


</html>
