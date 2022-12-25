@extends('base')
@section('contenido')

<div class="container w-75 my-5">
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

    <h4 class="my-4">Mis turnos</h4>

    <table class="table-responsive-sm table table-light table-striped">
        <thead class="table-info">
        <tr>
            <th scope="col">Dia</th>
            <th scope="col">Hora</th>
            <th scope="col">Tratamiento</th>
            <th scope="col">Profesional</th>
            <th scope="col">Sucursal</th>
            <th scope="col">Cancelar</th>
            <!--<th scope="col">Disponible</th>!-->
        </tr>
        </thead>
        <tbody>
        @foreach ($turnos as $turno)
        <tr>
            @php
                $dia = DB::selectOne("SELECT * FROM dia WHERE id = {$turno->dia_id}");
                $fecha = $dia->dia_nom . ", " . $dia->dia_num . " del " . $dia->dia_mes;
                $hora = \App\Http\Controllers\TurnoController::traducirHorario($turno->hora);
            @endphp
            <td class="align-middle">{{$fecha}}</td>
            <td class="align-middle">{{$hora }}</td>
            <td class="align-middle">{{ \App\Http\Controllers\TratamientoController::nombreTratamiento($turno->id_tratamiento) }}</td>
            <td class="align-middle">{{ \App\Http\Controllers\ProfesionalController::nombreProfesional($turno->id_profesional) }}</td>
            <td class="align-middle">{{ \App\Http\Controllers\LocacionController::nombreLocacion($turno->id_locacion) }}</td>
            <td class="align-middle"><form action="{{ route('turnos.destroy', $turno->id) }}" method="POST">
                    @csrf
                    <div class="text-center">
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')" class="btn btn-danger">Eliminar</button>
                    </div>
                </form></td>
            <!--<td class="align-middle">{{ \App\Http\Controllers\TurnosShowController::turnoDisponible($turno->id) }}</td>!-->

            {{--<td class="align-middle"><a>{{ $dia->dia_nom }}</a></td>
            <td class="align-middle">{{ $locacion->calle }}</td>
            <td class="align-middle">{{ $locacion->altura }}</td>
            <td class="align-middle">{{ $locacion->piso }}</td>
            <td class="align-middle">{{ $locacion->depto }}</td>--}}
            {{--<td class="align-middle"><form action="{{ route('locaciones.edit', $locacion->id) }}">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </td>--}}
            {{--<td class="align-middle">
                <form action="{{ route('locaciones.destroy', $locacion->id) }}" method="POST">
                    @csrf
                    <div class="text-center">
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $locacion->ciudad }}?')" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </td>--}}
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection('contenido')




