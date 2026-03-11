
@extends('student.main')

@section('title', env('APP_NAME'))




@section('content')
    @include('student.0Inicio.aCarrusel')
    @include('student.0Inicio.bSquares')
    @include('student.0Inicio.cWelcome')
    @include('student.0Inicio.dRunauto')
    @include('student.0Inicio.eQuantities')
    @include('student.0Inicio.fDecano')
    @include('student.0Inicio.gAuditoriums')
    @include('student.0Inicio.hRcu')
    @include('student.0Inicio.iPortfolio')
    @include('student.0Inicio.jHorarios')
    @include('student.0Inicio.kBachiller')
@endsection
