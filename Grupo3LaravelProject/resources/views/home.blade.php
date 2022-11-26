@extends('base')
@section('contenido')
    id user logueado: {{ \Illuminate\Support\Facades\Auth::user()->email }}
@endsection()
