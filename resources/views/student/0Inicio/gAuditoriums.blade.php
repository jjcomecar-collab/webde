<!-- AUDITORIOS Y BIBLIO -->
<section id="blog-posts" class="blog-posts section mt-4 z-border border-info">


    <div class="container section-title" data-aos="fade-up">
        <h2>AUDITORIOS</h2>
    </div>


    <div class="container">
        <div class="row gy-4">
            @foreach ($auditorios as $item)
                <div class="col-lg-4">
                    <article class="position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset($item->image) }}"
                                 class="img-fluid"
                                 alt="{{ $item->title }}">
                        </div>

                        <div class="post-content d-flex flex-column">
                            <h3 class="post-title text-center">
                                {{ $item->title }}
                            </h3>
                        </div>

                    </article>
                </div>
                <!-- End post list item -->
            @endforeach

        </div>
    </div>

</section>
<!-- /Blog Posts Section -->
