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

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                   name="nombre" @if(isset($locacion)) value="{{ $locacion->nombre }}"
                   @endif value="{{ old('nombre') }}" autofocus>

            @if ($errors->has('nombre'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                    <br>
                </span>
            @endif

            <label for="direccion">Descripción</label>
            <textarea class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                      name="direccion" autofocus>@if(isset($locacion)){{ $locacion->direccion }}@endif{{ old('direccion') }}</textarea>
            {{--el textarea tiene que estar escrito si o si en una sola línea xq sino agrega los enters como si fueran parte del input--}}

            @if ($errors->has('direccion'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('direccion') }}</strong>
                    <br>
                </span>
            @endif

        </div>

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>

@endsection('contenido')
