<section class="features section">

    @foreach ($rcus as $item)
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $item->title }}</h2>
            <p>{{ $item->description }}</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="features-item justify-content-center">

                        <i class="{{ $item->icon }}" style="color: #33c010ff;"></i>

                        <h3>
                            <a href="{{ $item->download_link }}"
                               target="_blank"
                               class="stretched-link">
                                Descargar
                            </a>
                        </h3>

                    </div>
                </div><!-- End Feature Item -->
            </div>
        </div>
    @endforeach

</section><!-- /Features Section -->
