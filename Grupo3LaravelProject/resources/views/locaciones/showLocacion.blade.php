@extends('base')
@section('contenido')
    <h1>{{ $locacion->ciudad }}</h1>
    @php
    $direccionCompleta = $locacion->calle . ' ' . $locacion->altura;

    if($locacion->piso != ''){
        $direccionCompleta .= ', piso ' . $locacion->piso;
    }

    if($locacion->depto != ''){
        $direccionCompleta .= ', departamento ' . $locacion->depto;
    }
    @endphp
    <a>{{ $direccionCompleta }}</a>

    <div>
        @php
            $direccion = str_replace(" ", "+", ($locacion->calle . '+' . $locacion->altura . $locacion->ciudad));
            $srcMapa = 'https://maps.google.com/maps?f=q&source=s_q&hl=es&geocode=&q=' . $direccion . '&z=14&output=embed';
        @endphp

        <iframe width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="{{ $srcMapa }}"></iframe>

        <form action="{{ route('turnos.index') }}" method="get">
            <button type="submit" class="btn btn-info">Pedir un turno para la sucursal
                de {{ $locacion->ciudad }}</button>
        </form>
    </div>

@endsection
