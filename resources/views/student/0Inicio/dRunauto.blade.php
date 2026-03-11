<section>
    <div class="container-fluid">
        <div data-aos="fade-up">
            <div class="marquee w-100 d-flex align-items-center overflow-hidden">
                <div class="marquee-content d-flex align-items-center gap-8">

                    @for ($i = 0; $i < 10; $i++)
                        @foreach ($runautos as $item)
                            <div class="marquee-tag hstack justify-content-center">
                                <img src="{{ asset($item->imagen) }}" width="70"
                                     alt="{{ $item->nombre }}"
                                     class="img-fluid">
                            </div>
                        @endforeach
                    @endfor

                </div>
            </div>
        </div>
    </div>
</section>
