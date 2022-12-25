@extends('base')
@section('contenido')

<div class="container w-75 my-5">
    <h4 class="my-4">Listado de tratamientos</h4>

    <form action="{{ route('tratamientos.create') }}">
        <button type="submit" class="btn btn-primary my-4">Crear nuevo tratamiento</button>
    </form>

    <table class="table-responsive-sm table table-light table-striped">
        <thead class="table-info">
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
            <td class="align-middle"><a href="{{ route('tratamientos.show', $tratamiento->id) }}">{{ $tratamiento->nombre }}</a></td>
            <td class="align-middle">{{ $tratamiento->descripcion }}</td>
            <td class="align-middle"><form action="{{ route('tratamientos.edit', $tratamiento->id) }}">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </td>
            <td class="align-middle">
                <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST">
                    @csrf
                    <div class="text-center">
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $tratamiento->nombre }}?')" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
@endsection('contenido')




