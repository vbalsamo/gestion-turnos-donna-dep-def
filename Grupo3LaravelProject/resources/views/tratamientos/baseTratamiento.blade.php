@extends('baseCreate')

@section('formulario')

    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre"
           @if(isset($tratamiento)) value="{{ $tratamiento->nombre }}" @endif>
    <label>Descripción</label>
    <textarea class="form-control" name="descripcion">@if(isset($tratamiento))
            {{ $tratamiento->descripcion }}
        @endif</textarea>
@endsection
