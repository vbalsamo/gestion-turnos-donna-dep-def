@extends('base')
@section('contenido')
    <h1>{{ $tratamiento->nombre }}</h1>
    <a>{{$tratamiento->descripcion}}</a>

    <div>
        <form action="{{ route('turnos.index') }}" method="get">
            <button type="submit" class="btn btn-info">Pedir turno para {{ $tratamiento->nombre }}</button>
        </form>
        <form action="{{ route('tratamientos.edit', $tratamiento->id_tratamiento) }}">
            <button type="submit" class="btn btn-secondary">Editar {{ $tratamiento->nombre }}</button>
        </form>
    </div>

@endsection
