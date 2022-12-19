@extends('base')
@section('contenido')

<div class="container w-75 my-5">
    <h4 class="my-4" style="color: #5a1d3e">Listado de profesionales</h4>
    <form action="{{ route('profesionales.create') }}">
        <button type="submit" class="btn btn-primary my-4">Agregar un profesional</button>
    </form>

    <table class="table-responsive-sm table table-light table-striped">
        <thead class="table-info">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tratamientos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Sucursal</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($profesionales_global as $profesional)
            <tr>
                <td class="align-middle">
                    <a>{{ $profesional->nombre }}</a>
                </td>
                <td class="align-middle">
                    <ul>
                        @foreach((\App\Http\Controllers\ProfesionalController::tratamientosProfesional($profesional->id)) as $tratamiento)
                            <li>
                                {{$tratamiento->nombre}}
                            </li>
                        @endforeach
                    </ul>

                </td>
                <td class="align-middle">{{ $profesional->numero_tel }}</td>
                <td class="align-middle">{{ $profesional->email }}</td>
                @php
                    $nombreLocacion = \App\Http\Controllers\LocacionController::nombreLocacion($profesional->locacion_id);
                @endphp
                <td class="align-middle">{{ $nombreLocacion }}</td>
                <td class="align-middle">
                    <form action="{{ route('profesionales.edit', $profesional->id) }}">
                        @csrf
                        <div class="text-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                        </div>
                    </form>
                </td>
                <td>
                    <form action="{{ route('profesionales.destroy', $profesional->id) }}" method="POST">
                        @csrf
                        <div class="text-center">
                        {{ method_field('DELETE') }}
                        <button type="submit"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $profesional->nombre }}?')"
                                class="btn btn-danger">Eliminar
                        </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection('contenido')
