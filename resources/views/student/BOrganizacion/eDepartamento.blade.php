
@extends('student.main')

@section('title', env('APP_NAME'))


@section('content')

<main class="main">

    {{-- PAGE TITLE --}}
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">
    {{ optional($departamento)->titulo_pagina }}
</h1>

        </div>
    </div>

    {{-- PERFIL --}}
    <div class="container d-flex justify-content-center">
        <div class="row w-100 justify-content-center">

            <div class="col sidebar" style="max-width: 800px;">
                <div class="widgets-container">

                    {{-- AUTOR --}}
                    <div class="blog-author-widget widget-item">
                        <div class="d-flex flex-column align-items-center text-center">

                            <img
    src="{{ optional($departamento)->imagen 
        ? asset('imagenes/'.optional($departamento)->imagen)
        : asset('student/main/assets/img/team/UserImg.png') }}"
    class="rounded-circle mb-3"
    width="150"
    alt="">


                          <h4>{{ optional($departamento)->nombre }}</h4>

                        </div>
                    </div>

                    {{-- FUNCIONES --}}
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Funciones</h3>

                       @if(optional($departamento)->funciones)
    @foreach($departamento->funciones as $funcion)
        <p>- {{ $funcion }}</p>
    @endforeach
@endif

                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- PLAN / CURRICULO --}}
    <section id="features" class="features section">

        <div class="container section-title" data-aos="fade-up">
            <h2>{{ optional($departamento)->plan_titulo }}</h2>

        </div>

        <div class="container">
            <div class="row gy-4">

                @if(optional($departamento)->planes)
    @foreach($departamento->planes as $plan)
        <div class="col-lg-6 col-md-6">
            <div class="features-item justify-content-center">
             <i class="bi {{ $plan['icono'] ?? 'bi-download' }}"
   style="--icon-color: {{ $plan['color'] ?? '#000' }}"></i>


                <h3>
                    <a href="{{ $plan['url'] }}" target="_blank" class="stretched-link">
                        {{ $plan['titulo'] }}
                    </a>
                </h3>
            </div>
        </div>
    @endforeach
@endif


            </div>
        </div>

    </section>

</main>


@endsection

