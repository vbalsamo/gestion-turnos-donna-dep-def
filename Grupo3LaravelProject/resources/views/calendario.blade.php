@extends('base')


    @section('contenido_header')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/calendarioSelect.css') }}">
    @endsection()

    @section('contenido')
        <h1>Día</h1>
        <div class="container-fluid w-50 position-absolute top-50 start-50 translate-middle rounded shadow" id="container">

            <div class="row align-items-stretch">

                <!-- IMAGEN -->
                <div class="col rounded-start d-none d-sm-block col-sm-4 col-md-5 col-lg-6" id="imagen">
                </div>
                <!-- FIN IMAGEN -->

                <!-- FORMULARIO DE TURNO -->
                <div class="col mx-3">

                    <form action="{{ route('turnos.elegirHorario') }}" METHOD="POST">
                        @csrf
                        <div class="row align-items-stretch text-center mt-5 mb-3">
                            <div class="col">
                                <h5>Filtre según el turno que desea</h5>
                            </div>
                        </div>


                        <div class="my-3" style="display: none">
                            <label for="locacion">Locación</label>
                            <select id="locacion" name="locacion" aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                                <option value ="" selected disabled></option>
                                @foreach ($locaciones_global as $locacion)
                                    <option value ="{{$locacion->id}}"  > {{$locacion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-3" style="display: none">
                            <label for="tratamiento">Tratamiento</label>
                            <select disabled id="tratamiento" name="tratamiento" aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                                    <option value ="{{$tratamiento}}"  > {{$tratamiento}}</option>
                            </select>
                        </div>

                        <div class="my-3">
                            <label for="mes">Mes</label>
                            <select disabled id="mes" name="mes" aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                                    <option value ="{{$mes}}"> {{$mes}}</option>
                            </select>
                        </div>

                        <div class="my-3">
                            <label for="dia">Día</label>
                            <select id="dia" name="dia" aria-controls="dataTable"
                                    class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                                <option value ="" selected disabled></option>
                                @foreach ($diasDisponibles as $dia)
                                    <option value ="{{$dia->id}}"  >{{ $dia->dia_nom }} {{ $dia->dia_num }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center mt-4 mb-5">
                            <button id="btnIngresar" type="submit" class="btn btn-secondary text-center">Confirmar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endsection()
</form>

