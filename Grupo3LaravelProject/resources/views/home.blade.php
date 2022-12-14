@extends('base')
@section('contenido')

<div id="carouselHome" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
        <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
        <li data-target="#carouselHome" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('verano.png') }}" alt="..." class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('promocion_navidad.png') }}" alt="..." class="d-block w-100">
        </div>
    </div>
    
    <a href="#carouselHome" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden shadow">Anterior</span>
    </a>
    <a href="#carouselHome" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden shadow">Siguiente</span>
    </a>
</div>

@endsection()
