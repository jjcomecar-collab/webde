@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')

<section id="team" class="team section">
    <div class="container">

        <div class="accordion" id="accordionCirculos">

            @foreach($circulos as $nombreCirculo => $items)

                <div class="accordion-item mb-3">

                    {{-- TITULO --}}
                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                        <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $loop->index }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $loop->index }}">
                            {{ strtoupper($nombreCirculo) }}
                        </button>
                    </h2>

                    {{-- CONTENIDO --}}
                    <div id="collapse{{ $loop->index }}"
                         class="accordion-collapse collapse"
                         aria-labelledby="heading{{ $loop->index }}"
                         data-bs-parent="#accordionCirculos">

                        <div class="accordion-body">
                            <div class="row gy-4 justify-content-center">

                                @foreach($items as $circulo)

                                    @php
                                        $orden = $loop->iteration;

                                        if ($orden == 1) {
                                            $colClass = 'col-12 d-flex justify-content-center';
                                            $cardStyle = 'max-width: 320px; width: 100%; 
                                                        border: 2px solid #d4af378a; 
                                                        border-radius: 12px; 
                                                        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.5);
                                                        padding: 10px;
                                                        background: #fff;';                                       
                                                     } else {
                                            $colClass = 'col-lg-3 col-md-4 col-sm-6 col-12 d-flex justify-content-center align-items-stretch';
                                            $cardStyle = 'width: 100%;';
                                        }
                                    @endphp

                                    <div class="{{ $colClass }}"
                                         data-aos="fade-up"
                                         data-aos-delay="{{ $loop->iteration * 100 }}">

                                                @if($orden == 1)
                                                    <div class="team-member text-center"
                                                        style="max-width: 320px; width: 100%;
                                                                border: 2px solid #d4af37;
                                                                border-radius: 12px;
                                                                box-shadow: 0 10px 25px rgba(212, 175, 55, 0.5);
                                                                padding: 10px;
                                                                background: #fff;">
                                                @else
                                                    <div class="team-member text-center" style="width: 100%;">
                                                @endif                                           
                                                <div class="member-img position-relative">
                                                    <img src="{{ $circulo->imagen 
                                                        ? asset('imagenes/' . $circulo->imagen) 
                                                        : asset('student/main/assets/img/team/UserImg.png') }}"
                                                        class="img-fluid like-img"
                                                        alt="{{ $circulo->nombre }}">

                                                    <!-- CORAZÓN -->
                                                    <div class="like-heart">😊</div>
                                                </div>

                                            <div class="member-info text-center">
                                                <h4>{{ $circulo->nombre }}</h4>
                                                <span style="font-style: italic;">
                                                    {{ $circulo->cargo ?? 'Miembro' }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>

@endsection


<style>
.like-heart {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    font-size: 80px;
    opacity: 0;
    pointer-events: none;
}

.like-heart.show {
    animation: heartPop 0.9s ease;
}

@keyframes heartPop {
    0% {
        transform: translate(-50%, -50%) scale(0.3);
        opacity: 0;
    }
    30% {
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 1;
    }
    60% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(-50%, -50%) scale(1.5);
        opacity: 0;
    }
}
</style>


<script>
document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll('.like-img').forEach(img => {

        img.addEventListener('dblclick', function() {

            const heart = this.parentElement.querySelector('.like-heart');

            heart.classList.remove('show'); // reset
            void heart.offsetWidth; // reinicia animación
            heart.classList.add('show');

        });

    });

});
</script>