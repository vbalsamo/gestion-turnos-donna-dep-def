@extends('base')
@section('contenido')
    <h1>{{ $locacion->nombre }}</h1>
    <a>{{$locacion->direccion}}</a>

    <div>
        <form action="{{ route('turnos.index') }}" method="get">
            <button type="submit" class="btn btn-info">Pedir un turno para la sucursal de {{ $locacion->nombre }}</button>
        </form>
    </div>

@endsection
