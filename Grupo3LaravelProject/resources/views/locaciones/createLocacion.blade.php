@extends('base')

@section('contenido')

    <form method="POST" action="
        @if(isset($locacion->id))
        {{ route('locaciones.update', $locacion->id)}}
        @else
        {{ route('locaciones.store') }}
        @endif">

        @csrf

        @if(isset($locacion->id))
            {{method_field('PATCH')}}
        @endif

        @php
            $campos = ['ciudad', 'calle', 'altura', 'piso', 'depto'];
        @endphp
        <div class="form-group">
            @foreach($campos as $campo)
                @if (!$errors->has($campo))
                    <label for="{{ $campo }}">{{ ucfirst($campo) }}</label>
                    <input id="{{ $campo }}" type="text" class="form-control{{ $errors->has($campo) ? ' is-invalid' : '' }}"
                           name="{{ $campo }}" @if(isset($locacion)) value="{{ $locacion->$campo }}"
                           @endif value="{{ old($campo) }}" autofocus>
                @else
                    <label for="{{ $campo }}">{{ ucfirst($campo) }}</label>
                    <input id="{{ $campo }}" type="text"
                           class="form-control is-invalid" name="{{ $campo }}">
                    @foreach($errors->get($campo) as $error)
                        <ul id="error-list-{{ $campo }}" class="invalid-feedback">
                            <li>{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif

            @endforeach
        </div>

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>

@endsection('contenido')
