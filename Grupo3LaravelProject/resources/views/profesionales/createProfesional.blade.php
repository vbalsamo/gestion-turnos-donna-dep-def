@extends('base')



@section('contenido')

<div class="container w-50 my-5">

    <form method="POST" id="form" action="
        @if(isset($profesional->id))
        {{ route('profesionales.update', $profesional->id)}}
        @else
        {{ route('profesionales.store') }}
        @endif">

        @csrf

        @if(isset($profesional->id))
            {{method_field('PATCH')}}
        @endif

        <div class="form-group">
        <h4 class="my-4" style="color: #5a1d3e">Agregar nuevo profesional</h4>

            @if (!$errors->has('nombre'))
                <div class="pt-4" style="color: #5a1d3e">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                       name="nombre" @if(isset($profesional)) value="{{ $profesional->nombre }}"
                       @endif value="{{ old('nombre') }}" autofocus>
                </div>
            @else
                <div class="pt-4" style="color: #5a1d3e">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text"
                       class="form-control is-invalid" name="nombre">
                @foreach($errors->get('nombre') as $error)
                    <ul id="error-list-nombre" class="invalid-feedback my-0 pt-1">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
                </div>
            @endif

            <label for="numero_tel">Telefono</label>
            @if (!$errors->has('numero_tel'))
                <div class="pt-4" style="color: #5a1d3e">
                <label for="numero_tel">Teléfono</label>
                <input id="numero_tel" type="text"
                       class="form-control{{ $errors->has('numero_tel') ? ' is-invalid' : '' }}"
                       name="numero_tel" @if(isset($profesional)) value="{{ $profesional->numero_tel }}"
                       @endif value="{{ old('numero_tel') }}" autofocus>
                </div>
            @else
                <div class="pt-4" style="color: #5a1d3e">
                <label for="numero_tel">Teléfono</label>
                <input id="numero_tel" type="text"
                       class="form-control is-invalid" name="numero_tel">
                @foreach($errors->get('numero_tel') as $error)
                    <ul id="error-list-numero_tel" class="invalid-feedback my-0 pt-1">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
                </div>
            @endif

            @if (!$errors->has('email'))
                <div class="pt-4" style="color: #5a1d3e">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" @if(isset($profesional)) value="{{ $profesional->email }}"
                       @endif value="{{ old('email') }}" autofocus>
                </div>
            @else
                <div class="pt-4" style="color: #5a1d3e">
                <label for="email">Email</label>
                <input id="email" type="text"
                       class="form-control is-invalid" name="email">
                @foreach($errors->get('email') as $error)
                    <ul id="error-list-email" class="invalid-feedback my-0 pt-1">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
                </div>
            @endif

            <div class="pt-4" style="color: #5a1d3e">
            <label>Locación</label><br>
            <select form="form" name="locacion" class="form-select @if($errors->has('locacion')) is-invalid @endif"
                    aria-label="Ciudad">
                <option disabled selected value="null">Seleccione una ciudad</option>
                @foreach($locaciones_global as $locacion)
                    <option value={{$locacion->id}}
                            @if(isset($profesional))
                                @if($locacion->id == $profesional->locacion_id)
                                    selected
                        @endif
                    @else

                        @endif
                    >{{ $locacion->ciudad }}</option>
                @endforeach
            </select>
            @foreach($errors->get('locacion') as $error)
                <ul id="error-list-locacion" style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #dc3545;">
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
            </div>

            <div class="pt-4" style="color: #5a1d3e">
            <label>Tratamientos</label><br>
            <div class="form-check px-2 align-middle">
                @foreach(($tratamientos_global) as $tratamiento)
                    <input type="checkbox" name="tratamientos[]"
                           class="form-check-input @if($errors->has('tratamientos')) is-invalid @endif"
                           @if(isset($tratamientosProfesional))
                               @if(in_array($tratamiento, $tratamientosProfesional))
                                   checked
                           @endif
                           @endif
                           value={{$tratamiento->id}}>
                    <label class="form-check-label">{{ $tratamiento->nombre }}</label>
                    <br>
                @endforeach
                @if($errors->has('tratamientos'))
                    @foreach($errors->get('tratamientos') as $error)
                        <ul id="error-list-tratamientos" class="invalid-feedback">
                            <li>{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif
            </div>

        </div>

        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

</div>

@endsection('contenido')
