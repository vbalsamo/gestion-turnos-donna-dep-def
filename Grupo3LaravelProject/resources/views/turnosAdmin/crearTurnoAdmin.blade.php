@extends('base')

@section('contenido_header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection
@section('contenido')

    @php
        use \Illuminate\Support\Facades\Auth;
        $cliente = Auth::user();
    @endphp

    <div class="container w-50 my-5">
        <form method="POST" action="{{ route('turnosAdmin.store')}}">
            @csrf
            {{method_field('PATCH')}}
            <div class="form-group">
                <h4 class="my-4" style="color: #5a1d3e">Abrir un horario</h4>

                <div class="row form-group">
                    <div class="">
                        <label for="fecha">Fecha</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" name="fecha" class="form-control">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                        </div>
                    </div>
                </div>

                <div class="pt-4" style="color: #5a1d3e">
                    <label for="Hora">Horario</label>
                    <select form="form" name="hora"
                            class="form-select"
                            aria-label="Hora">
                        <option disabled selected value="null">Seleccione un horario</option>
                        @foreach($tratamientos_global as $tratamiento)
                            <option value={{$tratamiento->id}}>{{ $tratamiento->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4" style="color: #5a1d3e">
                    <label for="Tratamiento">Tratamiento</label>
                    <select form="form" name="tratamiento"
                            class="form-select"
                            aria-label="tratamiento">
                        <option disabled selected value="null">Seleccione un tratamiento</option>
                        @foreach($tratamientos_global as $tratamiento)
                            <option value={{$tratamiento->id}}>{{ $tratamiento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker();
        });
    </script>

    <script>
        $(document).ready(function () {
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if (exist) {
                alert(msg);
            }
        });
    </script>
@endsection('contenido')


