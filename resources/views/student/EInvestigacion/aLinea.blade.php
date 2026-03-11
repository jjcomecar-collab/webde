@extends('student.main')

@section('content')
<section class="section light-background">
<div class="container">

@if($linea)

<div class="row align-items-center mb-5">
    <div class="col-lg-6">
        @if($linea->about_imagen)
            <img src="{{ asset('imagenes/'.$linea->about_imagen) }}"
                 class="img-fluid rounded shadow">
        @endif
    </div>

    <div class="col-lg-6">
        <h2>{{ $linea->about_titulo }}</h2>
        <p>{{ $linea->about_descripcion }}</p>

        @if($linea->about_video_url)
            <a href="{{ $linea->about_video_url }}"
               class="btn btn-outline-primary glightbox">
               Ver video
            </a>
        @endif
    </div>
</div>

<div class="row">
@foreach($linea->services ?? [] as $service)
    <div class="col-md-4">
        <div class="p-4 bg-white shadow rounded text-center">
            <i class="{{ $service['icono'] }} fs-2"></i>
            <h4>{{ $service['titulo'] }}</h4>
            <p>{{ $service['descripcion'] }}</p>
        </div>
    </div>
@endforeach
</div>

@else
<p>No hay contenido disponible.</p>
@endif

</div>
</section>
@endsection
