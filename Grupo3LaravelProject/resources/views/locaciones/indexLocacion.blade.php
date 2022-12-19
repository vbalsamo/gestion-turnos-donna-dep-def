@extends('base')
@section('contenido')

<div class="container w-75 my-5">

    <h4 class="my-4">Listado de locaciones</h4>

    <form action="{{ route('locaciones.create') }}">
        <button type="submit" class="btn btn-primary my-4">Crear nueva locación</button>
    </form>

    <table class="table-responsive-sm table table-light table-striped">
        <thead class="table-info">
        <tr>
            <th scope="col">Ciudad</th>
            <th scope="col">Calle</th>
            <th scope="col">Altura</th>
            <th scope="col">Piso</th>
            <th scope="col">Depto</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        @foreach ($locaciones_global as $locacion)
        <tr>
            <td class="align-middle"><a href="{{ route('locaciones.show', $locacion->id) }}">{{ $locacion->ciudad }}</a></td>
            <td class="align-middle">{{ $locacion->calle }}</td>
            <td class="align-middle">{{ $locacion->altura }}</td>
            <td class="align-middle">{{ $locacion->piso }}</td>
            <td class="align-middle">{{ $locacion->depto }}</td>
            <td class="align-middle"><form action="{{ route('locaciones.edit', $locacion->id) }}">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </div>
                </form>
            </td>
            <td class="align-middle">
                <form action="{{ route('locaciones.destroy', $locacion->id) }}" method="POST">
                    @csrf
                    <div class="text-center">
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar {{ $locacion->ciudad }}?')" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
@endsection('contenido')




