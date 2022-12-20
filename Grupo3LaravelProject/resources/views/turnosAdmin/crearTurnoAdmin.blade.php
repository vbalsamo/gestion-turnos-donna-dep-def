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
    <div class="container w-50 my-5">
        <form method="POST" action="@if(isset($turno->id))
        {{ route('turnosAdmin.update', $turno->id)}}
    @else
        {{ route('turnosAdmin.store') }}
    @endif">
            @csrf

            @if(isset($turno->id))
                {{method_field('PATCH')}}
            @endif

            <div class="form-group">
                <h4 class="my-4" style="color: #5a1d3e">Abrir un horario</h4>

                <div class="pt-4" style="color: #5a1d3e">
                    <label for="Hora">Horario</label>
                    <select form="form" name="hora"
                            class="form-select"
                            aria-label="hora">
                        <option disabled selected value="null">Seleccione un horario</option>
                        <option value='1'>9 a 10</option>
                        <option value='2'>10 a 11</option>
                        <option value='3'>11 a 12</option>
                        <option value='4'>12 a 13</option>
                        <option value='5'>13 a 14</option>
                        <option value='6'>14 a 15</option>
                        <option value='7'>15 a 16</option>
                        <option value='8'>16 a 17</option>
                        <option value='9'>17 a 18</option>
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

                <div class="pt-4" style="color: #5a1d3e">
                    <label for="locacion">Sucursal</label>
                    <select form="form" name="locacion"
                            class="form-select"
                            aria-label="locacion">
                        <option disabled selected value="null">Seleccione un locacion</option>
                        @foreach($locaciones_global as $locacion)
                            <option value={{$locacion->id}}>{{ $locacion->ciudad }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4" style="color: #5a1d3e">
                    <label for="profesional">Profesional</label>
                    <select form="form" name="profesional"
                            class="form-select"
                            aria-label="profesional">
                        <option disabled selected value="null">Seleccione un profesional</option>
                        @foreach($profesionales_global as $profesional)
                            <option value={{$profesional->id}}>{{ $profesional->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
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


