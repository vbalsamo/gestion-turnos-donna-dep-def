@extends('base')
@section('contenido')
    <form method="POST" action=@yield('action')>

    <div class="form-group">
        @csrf
        @yield('method')

        @yield('formulario')
    </div>

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>
@endsection
