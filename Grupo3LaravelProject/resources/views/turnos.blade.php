@extends('base')

<form action="{{ route('turnos.store') }}" METHOD="POST">
    @csrf
    <p>Filtre según el turno que desea: </p>

    <!--Cargar en el form id del cliente y id del turno -->

@foreach($turnosFav as $turnoFav)
    <p>{{$turnoFav->tratamiento}}</p>
    <p>{{$turnoFav->hora}}</p>
    <p>{{$turnoFav->profesional}}</p>

@endforeach

@foreach ($turnos as $turno)
    <p>{{$turno->tratamiento}}</p>
    <p>{{$turno->hora}}</p>
    <p>{{$turno->profesional}}</p>
@endforeach

    <button type="submit" class="btn btn-secondary">Confirmar</button>

</form>

