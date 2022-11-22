@extends('tratamientos/baseTratamiento')

@section('action')

    "{{ route('tratamientos.update', $tratamiento->id)}}"

@endsection

@section('method')
    @method('PATCH')
@endsection


