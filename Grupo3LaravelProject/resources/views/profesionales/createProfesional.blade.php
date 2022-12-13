@extends('base')

@section('contenido')

    <form method="POST" action="
        @if(isset($locacion->id))
        {{ route('profesionales.update', $profesional->id)}}
        @else
        {{ route('profesionales.store') }}
        @endif">

        @csrf

        @if(isset($profesional->id))
            {{method_field('PATCH')}}
        @endif

        <div class="form-group">
            @if (!$errors->has('nombre'))
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                       name="nombre" @if(isset($profesional)) value="{{ $profesional->nombre }}"
                       @endif value="{{ old('nombre') }}" autofocus>
            @else
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text"
                       class="form-control is-invalid" name="nombre">
                @foreach($errors->get('nombre') as $error)
                    <ul id="error-list-nombre" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

            @if (!$errors->has('numero_tel'))
                <label for="numero_tel">Telefono</label>
                <input id="numero_tel" type="text"
                       class="form-control{{ $errors->has('numero_tel') ? ' is-invalid' : '' }}"
                       name="numero_tel" @if(isset($profesional)) value="{{ $profesional->numero_tel }}"
                       @endif value="{{ old('numero_tel') }}" autofocus>
            @else
                <label for="numero_tel">Telefono</label>
                <input id="numero_tel" type="text"
                       class="form-control is-invalid" name="numero_tel">
                @foreach($errors->get('numero_tel') as $error)
                    <ul id="error-list-numero_tel" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

            @if (!$errors->has('email'))
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" @if(isset($profesional)) value="{{ $profesional->email }}"
                       @endif value="{{ old('email') }}" autofocus>
            @else
                <label for="email">Email</label>
                <input id="email" type="text"
                       class="form-control is-invalid" name="email">
                @foreach($errors->get('email') as $error)
                    <ul id="error-list-email" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

        </div>

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>

@endsection('contenido')
