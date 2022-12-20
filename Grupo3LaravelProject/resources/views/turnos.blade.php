@extends('base')
{{-- <form action="{{ route('turnos.store') }}" METHOD="POST">
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

</form> --}}

@section('contenido_header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/calendarioSelect.css') }}">
@endsection()

@section('contenido')

    <div class="container-fluid w-50 position-absolute top-50 start-50 translate-middle rounded shadow" id="container">

        <div class="row align-items-stretch">

            <!-- IMAGEN -->
            <div class="col rounded-start d-none d-sm-block col-sm-4 col-md-5 col-lg-6" id="imagen2">
            </div>
            <!-- FIN IMAGEN -->

            <!-- FORMULARIO DE TURNO -->
            <div class="col mx-3">

                <form action="{{ route('turnos.store') }}" METHOD="POST">
                    @csrf
                    <div class="row align-items-stretch text-center mt-5 mb-3">
                        <div class="col">
                            <h5>Selección de turno</h5>
                        </div>
                    </div>

                    <div class="my-3" style="display: none">
                        <label for="locacion">Locación</label>
                        <select id="locacion" name="locacion" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value="" selected disabled></option>
                                <option value="{{$locacion}}"> {{$locacion}}</option>
                        </select>
                    </div>

                    <div class="my-3" style="display: none">
                        <label for="tratamiento">Tratamiento</label>
                        <select disabled id="tratamiento" name="tratamiento" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value="{{$tratamiento}}"> {{$tratamiento}}</option>
                        </select>
                    </div>

                    {{dd($locacion)}}

                    <div class="my-3" style="display: none">
                        <label for="mes">Mes</label>
                        <select disabled id="mes" name="mes" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value="{{$mes}}"> {{$mes}}</option>
                        </select>
                    </div>

                    <div class="my-3" style="display: none">
                        <label for="mes">Día</label>
                        <select id="mes" name="mes" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value="" selected disabled></option>
                            <option value="{{ $dia }}">{{ $dia }}</option>
                        </select>
                    </div>

                    @php
                        $horariosLibres = \App\Http\Controllers\TurnoController::horariosLibres($dia, 1);
                    @endphp
                    @php
                        $horario = [
                            '1' => '9 a 10',
                            '2' => '10 a 11',
                            '3' => '11 a 12',
                            '4' => '12 a 13',
                            '5' => '13 a 14',
                            '6' => '14 a 15',
                            '7' => '15 a 16',
                            '8' => '16 a 17',
                            '9' => '17 a 18'
                            ];
                    @endphp
                    <div class="my-3">
                        <label class="py-2" for="horario">Horarios disponibles:</label>
                        <select id="horario" name="turnoId" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option selected>Seleccione un turno</option>
                            @foreach($horariosLibres as $horarioLibre)
                                <option value='{{ $horarioLibre->id }}'>{{ $horario[$horarioLibre->hora] }}</option>
                            @endforeach
                                {{-- @foreach ($locaciones_global as $locacion)
                                <option value ="horario:{{  }}"  > {{  }}</option>
                                @endforeach --}}
                        </select>
                        {{-- <label for="locacion">Locación</label>
                        <select id="locacion" name="locacion" aria-controls="dataTable"
                                class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value ="" selected disabled></option>
                            @foreach ($locaciones_global as $locacion)
                            <option value ="{{$locacion->id}}"  > {{$locacion->nombre}}</option>
                            @endforeach
                        </select> --}}
                    </div>

                    <div class="text-center mt-4 mb-5">
                        <button id="btnIngresar" type="submit" class="btn btn-secondary text-center">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
