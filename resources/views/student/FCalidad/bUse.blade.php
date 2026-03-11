@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')

<main class="main">

    {{-- =======================
        TÍTULO PRINCIPAL
    ======================== --}}
    <div class="text-center mt-5 mb-4">
        <h2 class="fw-bold text-uppercase lh-base titulo-academico">
            <span class="d-block fs-3 text-success">USE</span>
        </h2>
        <div class="mx-auto my-3" style="width:150px;height:4px;background:#ffc107;border-radius:5px;"></div>
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
                             class="img-fluid rounded shadow img-zoom-external"
                             alt="About">
                    @endif
                </div>

                <div class="col-lg-6">
                    <h2 class="fw-bold mb-2">{{ $about->titulo }}</h2>
                    <h6 class="text-muted mb-3">{{ $about->year }} · {{ $about->subtitulo }}</h6>
                    <p class="mb-4">{{ $about->descripcion }}</p>

                    @if($about->items)
                        <ul class="list-unstyled mb-4">
                            @foreach($about->items as $item)
                                <li class="d-flex align-items-start mb-2">
                                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <p class="mb-4">{{ $about->descripcion_final }}</p>

                    @if($about->video_url)
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
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
                    <div class="service-item {{ $service->color }}">
                        <i class="{{ $service->icono }}"></i>
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
            <div class="row g-4 mb-5">

                {{-- SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($serviceDetail->menu ?? [] as $item)
                                <li class="list-group-item d-flex align-items-center">
                                    <span class="badge bg-info rounded-circle me-2 d-flex align-items-center justify-content-center"
                                          style="width:1.5rem;height:1.5rem;">
                                        <i class="bi bi-check-lg text-white"></i>
                                    </span>
                                    {{ $item }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- CONTENIDO --}}
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">

                            <h3 class="fw-bold mb-3">{{ $serviceDetail->titulo }}</h3>

                            @if($serviceDetail->imagen)
                            <div class="position-relative d-inline-block">
                                <img src="{{ asset('imagenes/'.$serviceDetail->imagen) }}"
                                     class="img-fluid rounded mb-3"
                                     alt="Servicio">

                                <span class="zoom-icon"
                                      data-bs-toggle="modal"
                                      data-bs-target="#imageZoomModal"
                                      data-img="{{ asset('imagenes/'.$serviceDetail->imagen) }}">
                                    <i class="bi bi-zoom-in"></i>
                                </span>
                            </div>
                            @endif

                            <p class="text-muted">{{ $serviceDetail->descripcion }}</p>

                            @if($serviceDetail->lista)
                                <ul class="list-unstyled mt-3">
                                    @foreach($serviceDetail->lista as $li)
                                        <li class="mb-2">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                            {{ $li }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if($serviceDetail->contenido_1)
                                <p>{{ $serviceDetail->contenido_1 }}</p>
                            @endif

                            @if($serviceDetail->contenido_2)
                                <p>{{ $serviceDetail->contenido_2 }}</p>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </section>
    @endif

    {{-- =======================
        MODAL ÚNICO IMAGEN
    ======================== --}}
    <div class="modal fade" id="imageZoomModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content bg-dark border-0">
                <div class="modal-body d-flex justify-content-center align-items-center position-relative">

                    <button type="button"
                            class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                            data-bs-dismiss="modal"></button>

                    <img src="" class="img-modal-zoom">
                </div>
            </div>
        </div>
    </div>

</main>

@endsection

@push('styles')
<style>
.titulo-academico { letter-spacing: 2px; }

.img-zoom-external {
    transition: transform .4s ease;
}
.img-zoom-external:hover {
    transform: scale(1.13);
}

.zoom-icon {
    position:absolute;
    bottom:20px;
    right:20px;
    width:42px;
    height:42px;
    background:rgba(0,0,0,.6);
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:.3s;
}
.zoom-icon:hover {
    background:rgba(0,0,0,.85);
    transform:scale(1.1);
}

.img-modal-zoom {
    max-width:70%;
    max-height:92vh;
    object-fit:contain;
}

.feature-box { transition:.3s; }
.feature-box:hover { transform:translateY(-6px); }
</style>
@endpush

@push('scripts')
<script>
const imageZoomModal = document.getElementById('imageZoomModal');
const modalImg = imageZoomModal.querySelector('.img-modal-zoom');

imageZoomModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    modalImg.src = button.getAttribute('data-img');
});
</script>
@endpush
