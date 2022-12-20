@extends('base')

<h1>Día</h1>

<form action="{{ route('turnos.store') }}" method="post">
    @csrf
    @method('POST')
@foreach ($diasDisponibles as $dia)
    <!--Poner una card por cada dia del mes en formato grid -->
                <button name="dia" value="{{ $dia->id }}">{{ $dia->dia_nom }} {{ $dia->dia_num }} de {{ $mes }}</button><br><br>
@endforeach
</form>

