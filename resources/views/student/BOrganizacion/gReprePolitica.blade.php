@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title accent-background py-4">
  <div class="container d-flex justify-content-between align-items-center">
    <h1 class="fw-bold mb-0">
        {{ $repre->page_title ?? 'Representación Política' }}
    </h1>
  </div>
</div>
<!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section py-5">
<div class="container">

<div class="row g-5 align-items-center position-relative">

{{-- IMAGEN --}}
<div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
    @if($repre && $repre->image)
        <img 
            src="{{ asset('imagenes/'.$repre->image) }}" 
            class="img-fluid rounded-4 shadow"
            alt="Representación">
    @endif
</div>

{{-- CONTENIDO --}}
<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

    <h2 class="fw-bold mb-3">
        {{ $repre->inner_title ?? '' }}
    </h2>

    <div class="mb-3 text-muted">
        <span class="badge bg-primary me-2">
            {{ $repre->year ?? '' }}
        </span>
        <span class="fw-semibold">
            {{ $repre->story_title ?? '' }}
        </span>
    </div>

    <p class="lead">
        {{ $repre->description ?? '' }}
    </p>

    {{-- LISTA --}}
    @if(!empty($repre->list_items))
    <ul class="list-unstyled bg-light p-4 rounded-3 mb-4">
        @foreach($repre->list_items as $item)
        <li class="d-flex align-items-start mb-2">
            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
            <span>{{ $item }}</span>
        </li>
        @endforeach
    </ul>
    @endif

    <p>
        {{ $repre->final_text ?? '' }}
    </p>

    {{-- VIDEO --}}
    @if($repre && $repre->video_url)
    <a href="{{ $repre->video_url }}" 
       class="btn btn-outline-primary d-inline-flex align-items-center gap-2 glightbox mt-3">
        <i class="bi bi-play-circle fs-4"></i>
        Ver Video
    </a>
    @endif

</div>

</div>
</div>
</section>
<!-- /About Section -->

</main>
@endsection
