@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')

@if($historia)
<section id="about" class="about section mb-5 py-4">
  <div class="container">

    <!-- Título -->
    <div class="row mb-4">
      <div class="col-12 text-center" data-aos="fade-down">
        <h2 class="inner-title fw-bold mb-3" style="font-size:2rem; color:#0b5ed7;">
          {{ $historia->title }}
          <br>
          <span style="color:#157347;">
            {{ $historia->subtitle }}
          </span>
        </h2>
        <hr class="mx-auto" style="width:250px; border:3px solid #115a38;">
      </div>
    </div>

    <!-- Contenido -->
    <div class="row align-items-center gy-4">

      <!-- Imagen -->
      <div class="col-lg-6 text-center" data-aos="zoom-in">
        @if($historia->image)
        <img src="{{ asset('imagenes_historias/'.$historia->image) }}"
             class="img-fluid rounded-4 shadow-lg"
             alt="Historia Facultad">
        @endif
      </div>

      <!-- Texto -->
      <div class="col-lg-6" data-aos="fade-up">
        <div class="our-story" style="line-height:1.8;">
          <p>{{ $historia->paragraph_1 }}</p>

          @if($historia->paragraph_2)
            <p>{{ $historia->paragraph_2 }}</p>
          @endif

          @if($historia->paragraph_3)
            <p>{{ $historia->paragraph_3 }}</p>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>
@else
    <div class="container text-center my-5">
        <p class="text-muted">No hay información histórica disponible.</p>
    </div>
@endif

<style>
#about .inner-title {
  text-transform: none;
  letter-spacing: 0.5px;
}

#about hr {
  transition: width 0.4s ease;
}

#about:hover hr {
  width: 150px;
}
</style>

@endsection
