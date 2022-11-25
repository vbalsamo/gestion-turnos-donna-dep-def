@extends('baseCreate')

@section('formulario')
    {{--<label>Nombre</label>
    @if(!empty($errors->get('nombre')))
        @foreach($errors->get('nombre') as $error)
            <a>{{ $error }}</a>
        @endforeach
    @endif
    <input type="text" name="nombre" class="form-control"
           @if(isset($tratamiento)) value="{{ $tratamiento->nombre }}" @endif
           @if(empty($errors->get('nombre')))
               @if(!is_null(old('nombre'))) value="{{ old('nombre') }}" @endif
           @else
               class="form-control is-invalid"

        @endif
    >
    <label>Descripción</label>
    @if(!empty($errors->get('nombre')))
        @foreach($errors->get('nombre') as $error)
            <a>{{ $error }}</a>
        @endforeach
    @endif
    <textarea class="form-control" name="descripcion">@if(isset($tratamiento))
            {{ $tratamiento->descripcion }}
        @endif</textarea>--}}

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
