@extends('base')

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
                            <h5>Filtre según el turno que desea</h5>
                        </div>
                </div>


                <div class="my-3">
                    <label for="locacion">Locación</label>
                    <select id="locacion" name="locacion" aria-controls="dataTable"
                            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                        <option value ="" selected disabled></option>
                        @foreach ($locaciones_global as $locacion)
                        <option value ="{{$locacion->id}}"  > {{$locacion->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="tratamiento">Tratamiento</label>
                    <select id="tratamiento" name="tratamiento" aria-controls="dataTable"
                            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value ="" selected disabled></option>
                        @foreach ($tratamientos_global as $tratamiento)
                            <option value ="{{$tratamiento->id}}"  > {{$tratamiento->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-3">
                    <label for="mes">Mes</label>
                    <select id="mes" name="mes" aria-controls="dataTable"
                            class="custom-select custom-select-sm form-control form-control-sm form-control-user">
                            <option value ="" selected disabled></option>
                        @foreach ($siguientes3meses as $mes)
                            <option value ="{{$mes}}"  > {{$mes}}</option>
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

@endsection()
