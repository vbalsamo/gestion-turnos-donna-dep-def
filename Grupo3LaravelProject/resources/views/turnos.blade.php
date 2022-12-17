@extends('base')

<form action="{{ route('turnos.store') }}" METHOD="POST">
    @csrf
    <p>Filtre según el turno que desea: </p>

    <!--Cargar en el form id del cliente y id del turno -->

@foreach($turnosFav as $turnoFav)
    <p>{{$turnoFav->getTratamiento()}}</p>
    <p>{{$turnoFav->getHora()}}</p>
    <p>{{$turnoFav->getProfesional()}}</p>

@endforeach

@foreach ($turnosFiltrados as $turno)
    <p>{{$turno->getTratamiento()}}</p>
    <p>{{$turno->getHora()}}</p>
    <p>{{$turno->getProfesional()}}</p>
@endforeach

    <button type="submit" class="btn btn-secondary">Confirmar</button>

</form>

