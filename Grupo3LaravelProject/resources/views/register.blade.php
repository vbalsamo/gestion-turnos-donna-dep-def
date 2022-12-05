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
            <img src="{{ asset('logo.png') }}" width="300" height="300" alt="Donna depilación definitiva">

        </div>
        <div class="col-md-7 col-xl-6 rounded-end">
            <h5 class="pt-5 pb-4 text-center">Ingrese sus credenciales</h5>
            <p class="ps-4">Todos los campos son obligatorios.</p>

            <!-- Log In -->

            <form action="{{ route('register.store') }}" method="POST" class="mx-4">
                @csrf
                <div class="mb-4">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" required>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="numero_tel" placeholder="Celular" required>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="id_usuarioCliente" placeholder="Usuario" required>
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña"
                           required>
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                           placeholder="Confirmar contraseña" required>
                </div>
                <span id='alerta'></span>
                <div class="mb-4 text-center">
                    <button id="btnRegistrarse" type="submit" class="btn btn-primary shadow">Registrarse</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    //todavia no funciona bien, es para comprobar si los campos 'contraseña' y 'confirmar contraseña' son iguales
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val().length == 0 && $('#confirm_password').val().length == 0) {
            $('#alerta').prop('hidden', true);
            $('#password, #confirm_password').attr('class', 'form-control');
            $('#btnRegistrarse').prop('disabled', true);

        } else if ($('#password').val() == $('#confirm_password').val()) {
            $('#alerta').html('Las contraseñas coinciden').css('color', 'green').prop('hidden', false);
            $('#password, #confirm_password').attr('class', 'form-control is-valid');
            $('#btnRegistrarse').prop('disabled', false);
        } else {
            $('#alerta').html('Las contraseñas no coinciden').css('color', 'red').prop('hidden', false);
            $('#password, #confirm_password').attr('class', 'form-control is-invalid');
            $('#btnRegistrarse').prop('disabled', true);
        }
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
