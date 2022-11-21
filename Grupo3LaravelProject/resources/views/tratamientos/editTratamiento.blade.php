@extends('tratamientos/baseTratamiento')

@section('action')

    "{{ route('tratamientos.update', $tratamiento->id_tratamiento)}}"

@endsection

@section('method')
    @method('PATCH')
@endsection


