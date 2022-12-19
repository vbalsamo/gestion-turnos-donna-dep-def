@extends('base')

@section('contenido')

    @php
        use \Illuminate\Support\Facades\Auth;
        $cliente = Auth::user();
    @endphp

    <div class="container w-50 my-5">

        <form method="POST" action="{{ route('register.update', $cliente->id)}}">
            @csrf
            {{method_field('PATCH')}}
            @php
                $campos = ['nombre', 'email', 'numero_tel', 'password', 'password_confirmation'];
            @endphp

            <div class="form-group">
                <h4 class="my-4" style="color: #5a1d3e">Mis Datos</h4>
                <div class="pt-4" style="color: #5a1d3e">
                    <label for="nombre">Nombre y Apellido</label>
                    <input id="nombre" type="text"
                           class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                           name="nombre" @if(isset($cliente)) value="{{ $cliente->nombre }}"
                           @endif value="{{ old('nombre') }}" autofocus>
                    @if($errors->has('nombre'))
                        @foreach($errors->get('nombre') as $error)
                            <ul id="error-list-nombre" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                    <label for="email">Email</label>
                    <input id="email" type="text"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" @if(isset($cliente)) value="{{ $cliente->email }}"
                           @endif value="{{ old('email') }}" autofocus>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <ul id="error-list-email" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                    <label for="numero_tel">Teléfono</label>
                    <input id="numero_tel" type="text"
                           class="form-control{{ $errors->has('numero_tel') ? ' is-invalid' : '' }}"
                           name="numero_tel" @if(isset($cliente)) value="{{ $cliente->numero_tel }}"
                           @endif value="{{ old('numero_tel') }}" autofocus>
                    @if($errors->has('numero_tel'))
                        @foreach($errors->get('numero_tel') as $error)
                            <ul id="error-list-numero_tel" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                    <a href="">Cambiar Contraseña</a>

                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-secondary">Guardar</button>
            </div>
        </form>

    </div>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
@endsection('contenido')


@section('contenido')
