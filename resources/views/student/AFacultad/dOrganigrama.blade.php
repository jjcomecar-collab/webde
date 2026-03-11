
@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')

@if($organigrama)
<section id="about" class="about section mb-4 text-center">
  <div class="container">

    <h2 class="inner-title mb-4" data-aos="fade-up">
      {{ $organigrama->title }}
    </h2>

    <div class="row justify-content-center">
      <div class="col-lg-10" data-aos="zoom-in">
        <div class="organigrama-frame p-3">
          <img src="{{ asset('imagenes_organigramas/'.$organigrama->image) }}"
               alt="{{ $organigrama->title }}"
               class="img-fluid rounded-3 shadow-lg w-100"
               style="object-fit: contain; max-height: 85vh;">
        </div>
      </div>
    </div>

  </div>
</section>
@else
  <p class="text-center text-muted">
    No hay organigrama disponible.
  </p>
@endif



<!-- Estilos -->
<style>
.organigrama-frame {
  border: 6px solid #1E3A8A; /* azul elegante institucional */
  border-radius: 20px;
  background: linear-gradient(145deg, #ffffff, #f3f4f6);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.organigrama-frame:hover {
  transform: scale(1.02);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
}
</style>



@endsection
