@extends('base')

@section('contenido')

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

        <label for="nombre">Nombre</label>
        <div class="form-group">
            @if (!$errors->has('nombre'))
                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                       name="nombre" @if(isset($profesional)) value="{{ $profesional->nombre }}"
                       @endif value="{{ old('nombre') }}" autofocus>
            @else
                <input id="nombre" type="text"
                       class="form-control is-invalid" name="nombre">
                @foreach($errors->get('nombre') as $error)
                    <ul id="error-list-nombre" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

            <label for="numero_tel">Telefono</label>
            @if (!$errors->has('numero_tel'))
                <input id="numero_tel" type="text"
                       class="form-control{{ $errors->has('numero_tel') ? ' is-invalid' : '' }}"
                       name="numero_tel" @if(isset($profesional)) value="{{ $profesional->numero_tel }}"
                       @endif value="{{ old('numero_tel') }}" autofocus>
            @else
                <input id="numero_tel" type="text"
                       class="form-control is-invalid" name="numero_tel">
                @foreach($errors->get('numero_tel') as $error)
                    <ul id="error-list-numero_tel" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

            <label for="email">Email</label>
            @if (!$errors->has('email'))
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" @if(isset($profesional)) value="{{ $profesional->email }}"
                       @endif value="{{ old('email') }}" autofocus>
            @else
                <input id="email" type="text"
                       class="form-control is-invalid" name="email">
                @foreach($errors->get('email') as $error)
                    <ul id="error-list-email" class="invalid-feedback">
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            @endif

            <label>Tratamientos</label><br>
            <div class="form-check">
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

            <label>Locacion</label><br>
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

        <div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>

@endsection('contenido')
