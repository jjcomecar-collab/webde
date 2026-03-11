<section class="features section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $bachillers->first()->titulo ?? 'BACHILLER' }}</h2>
        <p>{{ $bachillers->first()->descripcion ?? '' }}</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4 justify-content-center">

            @foreach($bachillers as $item)
                <div class="col-lg-3 col-md-4"
                     data-aos="fade-up"
                     data-aos-delay="{{ $loop->index * 100 }}">

                    <div class="features-item justify-content-center">
                       

                             <i class="{{ $item->icono }}"
                        @style(['color' => $item->color])>
                        </i>


                        <h3>
                            <a href="{{ $item->url }}"
                               target="_blank"
                               class="stretched-link">
                                Ver Requisito
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
