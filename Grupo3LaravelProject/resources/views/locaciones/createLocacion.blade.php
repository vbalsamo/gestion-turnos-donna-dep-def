@extends('base')

@section('contenido')

<div class="container w-50 my-5">

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
        <h4 class="my-4" style="color: #5a1d3e">Agregar nueva sucursal</h4>
            @foreach($campos as $campo)
                @if (!$errors->has($campo))
                    <div class="pt-4" style="color: #5a1d3e">
                    <label for="{{ $campo }}">{{ ucfirst($campo) }}</label>
                    <input id="{{ $campo }}" type="text" class="form-control{{ $errors->has($campo) ? ' is-invalid' : '' }}"
                           name="{{ $campo }}" @if(isset($locacion)) value="{{ $locacion->$campo }}"
                           @endif value="{{ old($campo) }}" autofocus>
                    </div>
                @else
                    <div class="pt-4">
                    <label for="{{ $campo }}">{{ ucfirst($campo) }}</label>
                    <input id="{{ $campo }}" type="text"
                           class="form-control is-invalid" name="{{ $campo }}">
                    @foreach($errors->get($campo) as $error)
                        <ul id="error-list-{{ $campo }}" class="invalid-feedback">
                            <li>{{ $error }}</li>
                        </ul>
                    @endforeach
                    </div>
                @endif

            @endforeach
        </div>

        <div class="pt-4">
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>
    
</div>

@endsection('contenido')
