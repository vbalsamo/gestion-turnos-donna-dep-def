@extends('base')
@section("contenido")
{{-- <form action="{{ route('turnos.store') }}" METHOD="POST">
    @csrf
    <p>Filtre según el turno que desea: </p>

    <!--Cargar en el form id del cliente y id del turno -->

@foreach($turnosFav as $turnoFav)
    <p>{{$turnoFav->getTratamiento()}}</p>
    <p>{{$turnoFav->getHora()}}</p>
    <p>{{$turnoFav->getProfesional()}}</p>

@endforeach

@foreach ($turnosFiltrados as $turno)
    <p>{{$turno->getTratamiento()}}</p>
    <p>{{$turno->getHora()}}</p>
    <p>{{$turno->getProfesional()}}</p>
@endforeach

    <button type="submit" class="btn btn-secondary">Confirmar</button>

</form> --}}

<p> pepe</p>


<div class="container w-75 position-absolute top-50 start-50 translate-middle rounded shadow" id="container" >
    <div class="row align-items-stretch">
        <div class="col-md-5 col-xl-6 rounded-start" >
            <select class="form-select" size="3" aria-label="size 3 select example" height="auto">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
                    
        </div>
        <div class="col-md-7 col-xl-6 rounded-end">
            <h5 class="py-5 text-center">Ingrese sus credenciales</h5>

            <!-- Log In -->
            <form action="{{ route('login.store') }}" method="POST" class="mx-4">
                @csrf
                <div class="mb-4">
                    @if (!$errors->has('email'))
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
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



@endsection