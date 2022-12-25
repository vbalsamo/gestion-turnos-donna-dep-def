@extends('base')

@section('contenido')

    @php
        use \Illuminate\Support\Facades\Auth;
        $cliente = Auth::user();
    @endphp

    <div class="container w-50 my-5">

        <form method="POST" action="{{ route('password.update', $cliente->id)}}">
            @csrf
            {{method_field('PATCH')}}
            <div class="form-group">
                <h4 class="my-4" style="color: #5a1d3e">Cambiar Contraseña</h4>
                <div class="pt-4" style="color: #5a1d3e">
                    <label for="old_password">Contraseña actual</label>
                    <input id="old_password" type="password"
                           class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                           name="old_password" autofocus>
                    @if($errors->has('old_password'))
                        @foreach($errors->get('old_password') as $error)
                            <ul id="error-list-old_password" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif
                    <br>
                    <label for="new_password">Nueva contraseña</label>
                    <input id="new_password" type="password"
                           class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                           name="new_password" autofocus>
                    @if($errors->has('new_password'))
                        @foreach($errors->get('new_password') as $error)
                            <ul id="error-list-new_password" class="invalid-feedback">
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif

                    <label for="new_password_confirmation">Confirmar nueva contraseña</label>
                    <input id="new_password_confirmation" type="password"
                           class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}"
                           name="new_password_confirmation" autofocus>
                    @if($errors->has('new_password_confirmation'))
                        @foreach($errors->get('new_password_confirmation') as $error)
                            <ul id="error-list-new_password_confirmation" class="invalid-feedback">
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
