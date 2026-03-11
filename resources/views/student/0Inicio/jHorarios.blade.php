<section class="features section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $header->titulo ?? 'HORARIOS' }}</h2>
        <p>{{ $header->descripcion ?? '' }}</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            @foreach($horarios as $index => $horario)
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="features-item justify-content-center">
                       <i class="{{ $horario->icono }}"
                        @style(['color' => $horario->color])>
                        </i>


                        <h3>
                            <a href="{{ $horario->url }}"
                               target="_blank"
                               class="stretched-link">
                                {{ $horario->titulo }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
