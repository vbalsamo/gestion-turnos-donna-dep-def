@extends('base')

<h1>Mes</h1>

<form action="{{ route('turnoShow') }}" METHOD="POST">
    @csrf

@foreach ($dias as $dia)
    <!--Poner una card por cada dia del mes en formato grid -->
    <p>{{$dia->getdiaNom()}}</p>
    <p>{{$dia->getdiaNum()}}</p>
@endforeach

    <button type="submit" class="btn btn-secondary">Confirmar</button>
</form>
