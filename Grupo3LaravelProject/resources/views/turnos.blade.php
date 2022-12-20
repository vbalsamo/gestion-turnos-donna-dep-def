@extends('base')
@section("contenido")
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
        <div class="col rounded-start d-none d-sm-block col-sm-4 col-md-5 col-lg-6" id="imagen">
        </div>
        <!-- FIN IMAGEN -->

        <!-- FORMULARIO DE TURNO -->
        <div class="col mx-3">

            <form action="{{ route('filter') }}" METHOD="POST">
                @csrf
                <div class="row align-items-stretch text-center mt-5 mb-3">
                        <div class="col">
                            <h5>Selección de turno</h5>
                        </div>
                </div>
                <div class="my-3">
                    <select id="locacion" name="locacion" aria-controls="dataTable"
                    class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                        <option selected>seleccione un turno</option>
                        <option value="" ></option>

                    </select>
                    <label for="locacion">Locación</label>
                    <select id="locacion" name="locacion" aria-controls="dataTable"
                            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                        <option value ="" selected disabled></option>
                        @foreach ($locaciones_global as $locacion)
                        <option value ="{{$locacion->id}}"  > {{$locacion->nombre}}</option>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous">
</script>



@endsection