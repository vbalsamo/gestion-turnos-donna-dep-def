@extends('base')

@section('contenido')

    @php
        use \Illuminate\Support\Facades\Auth;
        $cliente = Auth::user();
    @endphp

    <div class="container w-50 my-5">

        <form method="POST" action="{{ route('turnosAdmin.store')}}">
            @csrf
            {{method_field('PATCH')}}
            <div class="form-group">
                <h4 class="my-4" style="color: #5a1d3e">Abrir un horario</h4>
                <div class="pt-4" style="color: #5a1d3e">
                    <label for="Tratamiento"></label>
                    <select form="form" name="tratamiento"
                            class="form-select @if($errors->has('tratamiento')) is-invalid @endif"
                            aria-label="Ciudad">
                        <option disabled selected value="null">Seleccione una ciudad</option>
                        @foreach($tratamientos_global as $tratamiento)
                            <option value={{$tratamiento->id}}
                            @if(isset($profesional))
                                @if($tratamiento->id == $profesional->tratamiento_id)
                                    selected
                                @endif
                            @else

                                @endif
                            >{{ $tratamiento->ciudad }}</option>
                        @endforeach
                    </select>

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
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-secondary">Guardar</button>
            </div>
        </form>
        <a href="{{ route('password.edit', $cliente->id) }}">Cambiar Contraseña</a>
        <br>
        <form action="{{ route('register.destroy', $cliente->id) }}" id="destroy-form" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <a class="dropdown-item font-weight-bold" href="#"
               onclick="document.getElementById('logout-form').submit()"></a>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        });
    </script>
@endsection('contenido')


