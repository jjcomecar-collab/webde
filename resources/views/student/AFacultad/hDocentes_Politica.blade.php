
@extends('student.main')

@section('title', env('APP_NAME'))


@section('content')



<section id="team" class="team section">
    <div class="container">
        <div class="row gy-4">

            <!-- DOCENTES NOMBRADOS -->
            <div class="page-title accent-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">
                        DOCENTES NOMBRADOS (Escuela Ciencia Politica y Gobernabilidad)
                    </h1>
                </div>
            </div>

            @foreach($nombrados as $docente)
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex align-items-stretch"
                 data-aos="fade-up" data-aos-delay="600">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset($docente->imagen ? 'imagenes/'.$docente->imagen : 'student/main/assets/img/team/UserImg.png') }}"
                             class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{{ $docente->nombre }}</h4>
                        <span style="font-style: italic;">
                            {{ $docente->descripcion ?? '-----' }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- ============================================================= -->

            <!-- DOCENTES CONTRATADOS -->
            <div class="page-title accent-background mt-5">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">
                        DOCENTES CONTRATADOS (Escuela Ciencia Politica y Gobernabilidad)
                    </h1>
                </div>
            </div>

            @foreach($contratados as $docente)
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex align-items-stretch"
                 data-aos="fade-up" data-aos-delay="600">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset($docente->imagen ? 'imagenes/'.$docente->imagen : 'student/main/assets/img/team/UserImg.png') }}"
                             class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{{ $docente->nombre }}</h4>
                        <span style="font-style: italic;">
                            {{ $docente->descripcion ?? '-----' }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


@endsection
