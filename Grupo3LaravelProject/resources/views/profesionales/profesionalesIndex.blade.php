@extends('base')
@section('contenido')
    <h1>Listado de profesionales</h1>
    <form action="{{ route('profesionales.create') }}">
        <button type="submit" class="btn btn-secondary">Agregar un profesional</button>
    </form>

    <table class="table table">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tratamientos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($profesionales_global as $profesional)
            <tr>
                <td><a {{--href="{{ route('profesionales.show', $profesional->id) }}"--}}>{{ $profesional->nombre }}</a>
                </td>
                <td>
                    <ul>
                        @foreach((\App\Http\Controllers\ProfesionalController::tratamientosProfesional($profesional->id)) as $tratamiento)
                            <li>
                                {{$tratamiento->nombre}}
                            </li>
                        @endforeach
                    </ul>

                </td>
                <td>{{ $profesional->numero_tel }}</td>
                <td>{{ $profesional->email }}</td>
                <td>
                    <form action="{{ route('profesionales.edit', $profesional->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('profesionales.destroy', $profesional->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $profesional->nombre }}?')"
                                class="btn btn-danger">Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('contenido')
