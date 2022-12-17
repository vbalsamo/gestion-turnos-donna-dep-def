@extends('base')

<form action="{{ route('filter') }}" METHOD="POST">
    @csrf
<p>Filtre según el turno que desea: </p>


<div>
    <label for="locacion">Locacion</label>
    <select id="locacion" name="locacion" aria-controls="dataTable"
            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
        <option value ="" selected disabled></option>
        @foreach ($locaciones_global as $locacion)
        <option value ="{{$locacion->id}}"  > {{$locacion->nombre}}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="tratamiento">Tratamiento</label>
    <select id="tratamiento" name="tratamiento" aria-controls="dataTable"
            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
            <option value ="" selected disabled></option>
        @foreach ($tratamientos_global as $tratamiento)
            <option value ="{{$tratamiento->id}}"  > {{$tratamiento->nombre}}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="mes">Mes</label>
    <select id="mes" name="mes" aria-controls="dataTable"
            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
            <option value ="" selected disabled></option>
        @foreach ($meses_global as $mes)
            <option value ="{{$mes->id}}"  > {{$mes->nombre}}</option>
        @endforeach
    </select>
</div>

    <button type="submit" class="btn btn-secondary">Confirmar</button>

</form>
