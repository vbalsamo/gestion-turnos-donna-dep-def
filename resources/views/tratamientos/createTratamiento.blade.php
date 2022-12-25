@extends('base')

@section('contenido')

<div class="container w-50 my-5">

    <form method="POST" action="
        @if(isset($tratamiento->id))
        {{ route('tratamientos.update', $tratamiento->id)}}
        @else
        {{ route('tratamientos.store') }}
        @endif">

        @csrf

        @if(isset($tratamiento->id))
            {{method_field('PATCH')}}
        @endif

        <div class="form-group">
        <h4 class="my-4">Agregar nuevo tratamiento</h4>
        
        <div class="py-4">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                   name="nombre" @if(isset($tratamiento)) value="{{ $tratamiento->nombre }}"
                   @endif value="{{ old('nombre') }}" autofocus>

            @if ($errors->has('nombre'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                    <br>
                </span>
            @endif
        </div>
        
        <div class="pb-4">
            <label for="descripcion">Descripción</label>
            @php
                $descripcionTextarea = '';

                if(isset($tratamiento)){
                    $descripcionTextarea = $tratamiento->descripcion;
                }else{
                    $descripcionTextarea = old('descripcion');
                }
            @endphp

            <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                      name="descripcion" autofocus>{{ $descripcionTextarea }}</textarea>
            {{--el textarea tiene que estar escrito si o si en una sola línea xq sino agrega los enters como si fueran parte del input--}}

            @if ($errors->has('descripcion'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                    <br>
                </span>
            @endif
        </div>

        </div>

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>
    
</div>

@endsection('contenido')
