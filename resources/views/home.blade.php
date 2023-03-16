@extends('base')
@section('contenido_header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection()
@section('contenido')

<!-- CAROUSEL -->

<div id="carouselExampleIndicators" class="carousel slide pause" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://i.ibb.co/5vxZPpV/verano.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="10000">
      <img src="https://i.ibb.co/p1J7wX3/promocion-navidad.png" class="d-block w-100" alt="...">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
<!-- FIN CAROUSEL -->

<!-- DESCRIPCION EN 3 COL -->
<div class="container inner-seccion mt-5">
    <div id="main">
        <div class="mt-10 mb-10">
            <div class="row">
                <div class="col-lg p-3 pl-10 pr-10 text-center">
                    <div class="my-3 pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                    </div>
                    <p class="h6"><strong>PROFESIONALES CALIFICADOS</strong></p>
                    <p class="def-font-09">Contamos con un grupo de especialistas en dermocosmeatría y
                        depilación definitiva.</p>
                </div>
                <div class="col-lg p-3 pl-10 pr-10 text-center col-border-left">
                    <div class="my-3 pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                    </div>
                    <p class="h6"><strong>LO MEJOR PARA TU PIEL</strong></p>
                    <p class="def-font-09"> Empleamos el método Soprano ICE, una solución
                        completa y versátil de depilación láser.
                </div>
                <div class="col-lg p-3 pl-10 pr-10 text-center col-border-left">
                    <div class="my-3 pt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-hearts mt-10" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                        </svg>
                    </div>
                    <p class="h6"><strong>ESTAMOS PARA VOS</strong></p>
                    <p class="def-font-09">Nuestro compromiso es escucharte y atender tus necesidades
                        de la mejor manera posible.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN DESCRIPCION EN 3 COL -->

<!-- DESCRIPCION 2 CON IMG -->
<div class="container inner-seccion my-5 pt-5">

        <div class="row">
            <div class="col-md-6 mx-auto my-auto">
                <img src="https://i.ibb.co/pLSLBGg/tratamiento-facial-home.jpg" class="mx-auto d-block img-fluid shadow">
            </div>
            <div class="col-sm-6 mx-auto my-auto py-5">
                <div class="row">
                    <div class="col text-center">
                        <div class="my-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg>
                        </div>
                        <h5 class="center text-center mb-3 mx-auto mw-50 fw-800" style="max-width: 400px !important;"><b>Somos un centro estético
                        dedicado al cuidado de tu piel y tu belleza mediante el mejor asesoramiento personalizado.</b></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="my-3 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                                <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                            </svg>
                        </div>
                        <p class="center text-center mb-3 mx-auto mw-50 fw-800" style="max-width: 400px !important;"><b>
                        Empleamos tecnología avalada para que tu piel quede luminosa, suave y flexible.</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="my-3 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                            </svg>
                        </div>
                        <p class="center text-center mb-3 mx-auto mw-50 fw-800" style="max-width: 400px !important;"><b>
                        Nuestros clientes nos prefieren por los resultados tras cada tratamiento eficaz.</b></p>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- FIN DESCRIPCION 2 CON IMG -->

@endsection()
