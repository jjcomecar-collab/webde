@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')

<main class="main">

  <!-- Service Details Section -->
  <section id="service-details" class="service-details section">

    <div class="container">
      <div class="row gy-4">

        {{-- ================= VALIDACIÓN PRO ================= --}}
        @if($poi)

          {{-- ========== COLUMNA IZQUIERDA ========== --}}
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            {{-- MENU EN LISTA DE CHECK --}}
            <div class="services-list">
                <ul class="list-group list-group-flush">
                    @foreach($poi->menu ?? [] as $item)
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-check-lg text-primary me-2"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>



            <h4>{{ $poi->subtitulo }}</h4>
            <p>{{ $poi->descripcion_corta }}</p>

          </div>

          {{-- ========== COLUMNA DERECHA ========== --}}
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            {{-- IMAGEN --}}
            @if(!empty($poi->imagen))
              <img
                src="{{ asset('imagenes/'.$poi->imagen) }}"
                alt="{{ $poi->titulo_principal }}"
                class="img-fluid services-img"
              >
            @endif

            <h3>{{ $poi->titulo_principal }}</h3>

            <p>{{ $poi->parrafo_1 }}</p>

            {{-- LISTA --}}
            @if(!empty($poi->lista))
              <ul>
                @foreach($poi->lista as $li)
                  <li>
                    <i class="bi bi-check-circle"></i>
                    <span>{{ $li }}</span>
                  </li>
                @endforeach
              </ul>
            @endif

            <p>{{ $poi->parrafo_2 }}</p>
            <p>{{ $poi->parrafo_3 }}</p>

          </div>

        {{-- ================= SIN DATOS ================= --}}
        @else
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="bi bi-exclamation-triangle"></i>
              No hay información disponible en este momento.
            </div>
          </div>
        @endif

      </div>
    </div>

  </section>
  <!-- /Service Details Section -->

</main>

@endsection
