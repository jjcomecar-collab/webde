@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel Administrativo</h1>
@stop

@section('content')
    <p>Bienvenido al Panel Administración NOW GOD</p>

    {{-- <a href="{{ route('backup.sql') }}" class="btn btn-primary">
        <i class="fas fa-database"></i> Descargar Backup SQL
    </a> --}}




@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop