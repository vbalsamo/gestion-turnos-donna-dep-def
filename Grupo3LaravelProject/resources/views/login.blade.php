<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login3.css') }}">
</head>
<body>

<div class="container w-75 position-absolute top-50 start-50 translate-middle rounded shadow" id="container">
    <div class="row align-items-stretch">
        <div class="col-md-5 col-xl-6 row-cols-2 rounded-start" id="logo">
            <img class="position-relative top-50 start-50 translate-middle" src="{{ asset('logo.png') }}" width="300"
                 height="300" alt="Donna depilación definitiva">
        </div>
        <div class="col-md-7 col-xl-6 rounded-end">
            <h5 class="py-5 text-center">Ingrese sus credenciales</h5>

            <!-- Log In -->
            <form action="{{ route('login.store') }}" method="POST" class="mx-4">
                @csrf
                <div class="mb-4">
                    @if (!$errors->has('email'))
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    @else
                        <input id="error-email" type="text" class="form-control is-invalid" name="email"
                               placeholder="Email">
                        @foreach($errors->get('email') as $error)
                            <ul id="error-list-email" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif
                </div>

                <div class="mb-4">
                    @if (!$errors->has('password'))
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    @else
                        <input id="error-password" type="password" class="form-control is-invalid" name="password"
                               placeholder="Contraseña">
                        @foreach($errors->get('password') as $error)
                            <ul id="error-list-password" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif
                </div>
                <div class="mb-4 text-center">
                    <button id="btnIngresar" type="submit" class="btn btn-primary shadow">Ingresar</button>
                </div>

                <div class="my-4 text-center">
                    <a id="btnRegistrarse" class="btn btn-primary shadow" href="{{ route('register.index') }}"
                       role="button">Registrarse</a>
                </div>
                <div class="mb-5 text-center">
                    <span><a href="#">¿Olvidó su clave o usuario?</a></span>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous">
</script>

<script>
    //todavia no funciona bien, es para comprobar si los campos 'contraseña' y 'confirmar contraseña' son iguales
    $('#error-email').on('keyup', function () {
        if ($('#error-email').attr('class', 'form-control is-invalid')) {
            $('#error-email').attr('class', 'form-control');
            $('#error-list-email').prop('hidden', 'true');
        }
    });
</script>
<script>
    $('#error-password').on('keyup', function () {
        if ($('#error-password').attr('class', 'form-control is-invalid')) {
            $('#error-password').attr('class', 'form-control');
            $('#error-list-password').prop('hidden', 'true');
        }
    });
</script>
</body>
</html>
