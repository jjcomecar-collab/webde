@if($welcome)
<section id="clients" class="clients section">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-bienv">
            {{ $welcome->title }}
        </h2>

        <p class="text-primary">
            {{ $welcome->description }}
        </p>
    </div>
</section>
@endif

