<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="container w-75 rounded shadow" id="container">
    <div class="row align-items-stretch">
        <div class="col-md-5 col-xl-6 rounded-start" id="logo">
            <img class="px-3 img-fluid position-relative top-50 start-50 translate-middle py-4 md-px-0" 
            src="{{ asset('logo.png') }}" width="300" height="auto" alt="Donna depilación definitiva" id="logoImg">

        </div>
        <div class="col-md-7 col-xl-6 rounded-end">
            <h5 class="pt-5 pb-4 text-center">Ingrese sus credenciales</h5>
            <p class="ps-4">Todos los campos son obligatorios.</p>


            <!-- Registro -->

            <form action="{{ route('register.store') }}" method="POST" class="mx-4">
                @csrf

                @php
                    $campos = ['nombre', 'email', 'numero_tel', 'password', 'password_confirmation'];
                    $placeholders = [
                        'nombre' => 'Nombre y Apellido',
                        'email' => 'Email',
                        'numero_tel' => 'Teléfono',
                        'password' => 'Contraseña',
                        'password_confirmation' => 'Confirmar contraseña'
                    ];
                    function tipoInput ($campo){
                        if($campo == 'password' or $campo == 'password_confirmation') return 'password';
                        else return 'text';
                    }
                @endphp

                @foreach($campos as $campo)
                    <div class="mb-4">
                        @if (!$errors->has($campo))
                            <input type="{{ tipoInput($campo) }}"
                                   class="form-control" name="{{ $campo }}" placeholder="{{ $placeholders[$campo] }}"
                                   value="{{ old($campo) }}"
                                    id="{{ $campo }}">
                        @else
                            <input id="{{ $campo }}" type="{{ tipoInput($campo) }}"
                                   class="form-control is-invalid" name="{{ $campo }}"
                                   placeholder="{{ $placeholders[$campo] }}">
                            @foreach($errors->get($campo) as $error)
                                <ul id="error-list-{{ $campo }}" class="invalid-feedback">
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                @endforeach
                <span id='alerta'></span>
                <div class="mb-4 text-center">
                    <button id="btnRegistrarse" type="submit" class="btn btn-primary shadow">Registrarse</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/register.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
