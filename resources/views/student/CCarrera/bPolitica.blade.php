@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')
<main class="main">

    {{-- =======================
        TÍTULO PRINCIPAL
    ======================== --}}
    <div class="text-center mt-5 mb-4">
        <h2 class="fw-bold text-uppercase lh-base titulo-academico">
            <span class="d-block fs-3 text-success">
                ESCUELA PROFESIONAL DE CIENCIA POLITICA Y GOBERNABILIDAD
            </span>
        </h2>
        <div class="mx-auto my-3"
            style="width:150px;height:4px;background:#ffc107;border-radius:5px;"></div>
    </div>







    {{-- =======================
        ABOUT
    ======================== --}}
    @if($about)
    <section id="about" class="about section py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 text-center">
                    @if($about->imagen)
                    <img src="{{ asset('imagenes/'.$about->imagen) }}"
                        class="img-fluid rounded shadow img-zoom-external">
                    @endif
                </div>

                <div class="col-lg-6">
                    <h2 class="fw-bold">{{ $about->titulo }}</h2>
                    <h6 class="text-muted">{{ $about->year }} · {{ $about->subtitulo }}</h6>
                    <p>{{ $about->descripcion }}</p>

                    @if($about->items)
                    <ul class="list-unstyled">
                        @foreach($about->items as $item)
                        <li>
                            <i class="bi bi-check-circle-fill text-primary"></i> {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <p>{{ $about->descripcion_final }}</p>

                    @if($about->video_url)
                    <button class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#videoModal">
                        <i class="bi bi-play-circle"></i> Ver video
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- MODAL VIDEO --}}
    @if($about->video_url)
    <div class="modal fade" id="videoModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="{{ $about->video_url }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif







    {{-- =======================
        SERVICES
    ======================== --}}
    @if($services->count())
    <section id="services" class="services section py-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item {{ $service->color }} text-center p-4 shadow rounded">
                        <i class="{{ $service->icono }} fs-1"></i>
                        <h4>{{ $service->titulo }}</h4>
                        <p>{{ $service->descripcion }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif







    {{-- =======================
    SERVICE DETAILS
    ======================== --}}
    @if($serviceDetails->count())
    <section id="service-details" class="section py-5 bg-light">
        <div class="container">

            @foreach($serviceDetails as $serviceDetail)
            <div class="row g-4 align-items-start mb-5">

                {{-- SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm " style="top: 80px;">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($serviceDetail->menu ?? [] as $item)
                                <li class="list-group-item d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    <span>{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- CONTENIDO --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h2 class="fw-bold mb-3">
                                {{ $serviceDetail->titulo }}
                            </h2>

                            @if($serviceDetail->imagen)
                            <div class="mb-4 rounded overflow-hidden shadow-sm zoom-overlay">
                                <img src="{{ asset('imagenes/'.$serviceDetail->imagen) }}"
                                    class="img-fluid rounded shadow-sm zoom-click"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imgModal{{ $serviceDetail->id }}">
                            </div>
                            @endif



                            <p class="text-muted fs-6">
                                {{ $serviceDetail->descripcion }}
                            </p>

                            @if($serviceDetail->lista)
                            <ul class="list-unstyled mt-4">
                                @foreach($serviceDetail->lista as $li)
                                <li class="d-flex align-items-start mb-2">
                                    <i class="bi bi-arrow-right-circle text-primary me-2"></i>
                                    <span>{{ $li }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            @if($serviceDetail->contenido_1)
                            <p class="mt-4">
                                {{ $serviceDetail->contenido_1 }}
                            </p>
                            @endif

                            @if($serviceDetail->contenido_2)
                            <p>
                                {{ $serviceDetail->contenido_2 }}
                            </p>
                            @endif

                        </div>
                    </div>
                </div>

            </div>


            {{-- MODAL ZOOM --}}
            <div class="modal fade" id="imgModal{{ $serviceDetail->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <img src="{{ asset('imagenes/'.$serviceDetail->imagen) }}"
                            class="img-fluid rounded">
                    </div>
                </div>
            </div>
            
            @endforeach

        </div>
    </section>
    @endif










    {{-- =======================
        FEATURES
    ======================== --}}
    @if($features->count())
    <section id="features" class="features section py-5">
        <div class="container">
            <div class="row justify-content-center g-4">
                @foreach($features as $feature)
                <div class="col-lg-5 col-md-6">
                    <a href="{{ $feature->url }}" target="_blank"
                        class="feature-box {{ $feature->color }} d-flex flex-column 
          align-items-center justify-content-center 
          gap-3 p-4 rounded shadow 
          text-decoration-none text-center">
                        <i class="{{ $feature->icono }} fs-2"></i>
                        <span class="fw-semibold fs-5">{{ $feature->titulo }}</span>
                    </a>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif



</main>
@endsection



{{-- =======================
    STYLES
======================== --}}
@push('styles')
<style>
    .titulo-academico {
        letter-spacing: 2px;
    }

    .feature-box {
        transition: .3s;
    }

    .feature-box:hover {
        transform: translateY(-6px);
    }
</style>
@endpush