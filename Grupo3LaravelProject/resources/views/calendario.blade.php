@extends('base')

<h1>Mes</h1>

<form action="{{ route('turnos.create') }}" METHOD="POST">
    @csrf

@foreach ($dias as $dia)
    <!--Poner una card por cada dia del mes en formato grid -->
    <p>{{$dia->diaNom}}</p>
    <p>{{$dia->diaNum}}</p>
@endforeach

</form>
