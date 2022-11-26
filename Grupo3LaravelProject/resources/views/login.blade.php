<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicia sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  </head>
  <body>

    <div class="container w-75 mt-5 rounded shadow" id="container">
        <div class="row align-items-stretch">
            <div class="col-md-5 col-xl-6 rounded-start" id="logo">
                <img src="{{ asset('logo.png') }}" width="300" height="300" alt="Donna depilación definitiva">

            </div>
            <div class="col-md-7 col-xl-6 rounded-end">
                <h5 class="py-5 text-center">Ingrese sus credenciales</h5>

                <!-- Log In -->

                <form action="{{ route('login.store') }}" method="POST" class="mx-4">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <div class="mb-4 text-center">
                        <button id="btnIngresar" type="submit" class="btn btn-primary shadow">Ingresar</button>
                    </div>

                    <div class="my-4 text-center">
                        <a id="btnRegistrarse" class="btn btn-primary shadow" href="{{ route('register.index') }}" role="button">Registrarse</a>
                    </div>
                    <div class="mb-5 text-center">
                        <span><a href="#">¿Olvidó su clave o usuario?</a></span>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
