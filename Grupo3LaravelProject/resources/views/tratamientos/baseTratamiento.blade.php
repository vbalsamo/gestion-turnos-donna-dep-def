@extends('baseCreate')

@section('formulario')

    <div class="form-group">
        <label for="nombre">Nombre</label>
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                   name="nombre" @if(isset($tratamiento)) value="{{ $tratamiento->nombre }}" @endif value="{{ old('nombre') }}" autofocus
                   >
            @if ($errors->has('nombre'))
                <span class="invalid feedback"role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                    <br>
                </span>
            @endif
        <label for="descripcion">Descripción</label>
        <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
               name="descripcion" value="{{ old('descripcion') }}" autofocus>
            @if(isset($tratamiento))
                {{ $tratamiento->descripcion }}
            @endif
        </textarea>
        @if ($errors->has('descripcion'))
            <span class="invalid feedback"role="alert">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                    <br>
                </span>
        @endif
        </div>

@endsection
