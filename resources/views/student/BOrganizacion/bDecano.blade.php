
@extends('student.main')

@section('title', env('APP_NAME'))


@section('content')
<main>

    <!-- TÍTULO -->
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">
                {{ $decano->titulo_pagina ?? 'Decano' }}
            </h1>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="row w-100 justify-content-center">

            <div class="col sidebar" style="max-width: 800px;">
                <div class="widgets-container">

                    <!-- DECANO -->
                    <div class="blog-author-widget widget-item">
                        <div class="d-flex flex-column align-items-center text-center">

                            @if(!empty($decano->imagen))
                                <img src="{{ asset('imagenes/'.$decano->imagen) }}"
                                     class="rounded-circle mb-3"
                                     width="150"
                                     alt="Decano">
                            @endif

                            <h4>{{ $decano->nombre ?? '' }}</h4>
                        </div>
                    </div>

                    <!-- FUNCIONES -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Funciones</h3>

                        @if(!empty($decano->funciones))
                            @foreach($decano->funciones as $funcion)
                                <p>– {{ $funcion }}</p>
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>

        </div>
    </div>

</main>

@endsection

