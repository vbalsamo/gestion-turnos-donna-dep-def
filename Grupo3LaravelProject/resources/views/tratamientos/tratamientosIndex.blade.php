@extends('base')
@section('contenido')
    <h1>Listado de tratamientos</h1>

    <form action="{{ route('tratamientos.create') }}">
        <button type="submit" class="btn btn-secondary">Crear nuevo tratamiento</button>
    </form>

    <table class="table table">
        <thead>
        <tr>
            <th scope="col">Tratamiento</th>
            <th scope="col">Descripción</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tratamientos_global as $tratamiento)
        <tr>
            <td><a href="{{ route('tratamientos.show', $tratamiento->id) }}">{{ $tratamiento->nombre }}</a></td>
            <td>{{ $tratamiento->descripcion }}</td>
            <td><form action="{{ route('tratamientos.edit', $tratamiento->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning">Editar</button>
                </form>
            </td>
            <td>
                <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $tratamiento->nombre }}?')" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection('contenido')




