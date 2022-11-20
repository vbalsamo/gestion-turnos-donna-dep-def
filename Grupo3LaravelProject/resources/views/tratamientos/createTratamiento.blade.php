@extends('base')
@section('contenido')
    <form method="POST" action=
        @if(isset($tratamiento))
            "{{ route('tratamientos.update', $tratamiento->id_tratamiento)}}"
        @else
            "{{ route('tratamientos.create') }}"
        @endif
    >
    <div class="form-group">
        @csrf
        @method('PATCH')

        <label>Id</label>
        <input type="text" class="form-control" name="id" disabled
               @if(isset($tratamiento)) value="{{ $tratamiento->id_tratamiento }}" @endif>
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre"
               @if(isset($tratamiento)) value="{{ $tratamiento->nombre }}" @endif>
        <label>Descripción</label>
        <textarea class="form-control" name="descripcion">@if(isset($tratamiento))
                {{ $tratamiento->descripcion }}
            @endif</textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-secondary">Guardar cambios</button>
    </div>
    </form>
@endsection
