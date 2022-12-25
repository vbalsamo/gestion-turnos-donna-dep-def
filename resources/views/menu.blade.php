@extends("base")
@section("contenido")

    @php
        use \Illuminate\Support\Facades\Auth;
        $cliente = Auth::user();
    @endphp

<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Bienvenido {{ $cliente->nombre }}</h1>
    </div>
</div>
<div class="album py-5" id="container_menu">
    <div class="container" >
      <div class="row row-cols-1 row-cols-lg-2  g-3">
        <div class="col">
          <div class="card shadow-sm" >
            <svg class="py-3" xmlns="http://www.w3.org/2000/svg" width="100%" height="225" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
            <div class="card-body">
              <p class="card-text"> Sacá tu turno aquí! </p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <form action="{{ route('turnos.index') }}">
                            <button type="submit" class="btn btn-outline-primary">Sacar Turno</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="py-3" xmlns="http://www.w3.org/2000/svg" width="100%" height="225" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
              </svg>
              <div class="card-body">
                <p class="card-text"> Mirá tus turnos aquí! </p>
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                          <form action="{{ route('turnos.mostrarTurnos') }}">
                            <button type="submit" class="btn btn-outline-primary">Ver mis turnos</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
