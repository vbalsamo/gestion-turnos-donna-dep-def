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
        </tr>
        </thead>
        <tbody>
        @foreach ($tratamientos_global as $tratamiento)
        <tr>
            <td><a href="{{ route('tratamientos.show', $tratamiento->id_tratamiento) }}">{{ $tratamiento->nombre }}</a></td>
            <td>{{ $tratamiento->descripcion }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection('contenido')
