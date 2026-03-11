<!-- DECANO -- IMG-TEXT-IMG -->
@if($decano)
<section class="container z-border border-danger">
    <div class="row">
        <div class="col-lg-6 wow fadeInUp"
            data-wow-delay="0.1s"
            style="min-height: 700px;">

            <div class="position-relative h-100">
                <img
                    class="img-fluid position-absolute w-100 h-100"
                    src="{{ asset('imagenes_decano/'.$decano->imagen) }}"
                    alt="{{ $decano->nombre }}"
                    style="object-fit: cover;">
            </div>
        </div>

        <div class="col-lg-6 wow fadeInUp z-border border-info"
            data-wow-delay="0.5s">
            <br><br><br>

            <h1 class="mb-4 z-border border-danger">
                {{ $decano->cargo }}
            </h1>

            <h6 class="me_section-title bg-white text-start text-primary pe-3">
                {{ $decano->nombre }}
            </h6>

            {{-- Texto opcional futuro --}}
            {{-- <p class="me_mb-4">{{ $decano->descripcion }}</p> --}}
        </div>
    </div>
</section>
@endif
