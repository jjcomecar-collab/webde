@extends('student.main')

@section('title', env('APP_NAME'))



@section('content')

<main class="main">

<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">
        {{ $responsocial->page_title ?? 'Responsabilidad Social' }}
    </h1>
  </div>
</div>
<!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">
<div class="container">
<div class="row position-relative">

{{-- IMAGEN --}}
<div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
    @if($responsocial && $responsocial->image)
        <img src="{{ asset('imágenes/'.$responsocial->image) }}" alt="">
    @endif
</div>

<div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
<h2 class="inner-title">
    {{ $responsocial->inner_title ?? '' }}
</h2>

<div class="our-story">
    <h4>{{ $responsocial->year ?? '' }}</h4>
    <h3>{{ $responsocial->story_title ?? '' }}</h3>

    <p>{{ $responsocial->description ?? '' }}</p>

    <ul>
        @foreach($responsocial->list_items ?? [] as $item)
        <li>
            <i class="bi bi-check-circle"></i>
            <span>{{ $item }}</span>
        </li>
        @endforeach
    </ul>

    <p>{{ $responsocial->final_text ?? '' }}</p>

    @if($responsocial && $responsocial->video_url)
    <div class="watch-video d-flex align-items-center position-relative">
        <i class="bi bi-play-circle"></i>
        <a href="{{ $responsocial->video_url }}"
           class="glightbox stretched-link">
           Watch Video
        </a>
    </div>
    @endif
</div>
</div>

</div>
</div>
</section>
<!-- /About Section -->

</main>



@endsection