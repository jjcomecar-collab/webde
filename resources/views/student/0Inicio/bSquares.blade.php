<section id="services" class="services section light-background">
    <div class="container-fluid">
        <div class="row gy-5">
            @foreach ($squares as $square)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $square->aos_delay }}">
                    <div class="service-item {{ $square->color_class }} position-relative">
                        <div class="icon">
                            <i class="{{ $square->icon }}"></i>
                        </div>
                        <a href="{{ $square->url }}" target="_blank" class="stretched-link">
                            <h3>{{ $square->title }}</h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
