@extends('base')
@section('contenido')
    <h1>{{ $tratamiento->nombre }}</h1>
    <a>{{$tratamiento->descripcion}}</a>

    <div>
        <form action="{{ route('turnos.index') }}" method="get">
            <button type="submit" class="btn btn-info">Pedir turno para {{ $tratamiento->nombre }}</button>
        </form>
    </div>

@endsection
