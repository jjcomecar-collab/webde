<section id="portfolio" class="portfolio section">
    <div class="container section-title" data-aos="fade-up">
        <h2>ACTUALIDAD INSTITUCIONAL</h2>
    </div>


    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Todos</li>
                <li data-filter=".filter-noticia">Noticias</li>
                <li data-filter=".filter-evento">Eventos</li>
                <li data-filter=".filter-onomastico">Onomásticos</li>
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
               
                @foreach($portfolioItems as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->categoria }}">
                        <img src="{{ asset('imagenes_portfolio/' . $item->imagen) }}" 
                            class="img-fluid" 
                            alt="{{ $item->titulo }}">

                        <div class="portfolio-info">
                            <h4>{{ $item->titulo }}</h4>
                            <p>{{ $item->descripcion }}</p>

                            <a href="{{ asset('imagenes_portfolio/' . $item->imagen) }}" 
                            title="{{ $item->titulo }}" 
                            data-gallery="portfolio-gallery-{{ $item->categoria }}" 
                            class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            
            </div>
        </div>
    </div>
</section>