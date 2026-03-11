
@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')



<section id="team" class="team section">

    <div class="container">

        {{-- PRIMER BLOQUE (DECANO CENTRADO) --}}
        @if($teams->count())
        <div class="row gy-4 justify-content-center text-center">
            @foreach($teams->where('orden', 0) as $item)
            <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up">

                <div class="team-member d-flex flex-column align-items-center w-100">
                    <div class="member-img d-flex justify-content-center">
                        <img src="{{ asset('imagenes_autoridades/'.$item->imagen) }}"
                             class="img-fluid"
                             alt="{{ $item->nombre }}">
                    </div>

                    <div class="member-info text-center">
                        <h4>{{ $item->cargo }}</h4>
                        <h5>{{ $item->nombre }}</h5>
                        <span style="font-style: italic;">
                            {{ $item->email ?? '- - - - -' }}
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        @endif

        <br><br><br>

        {{-- RESTO DEL EQUIPO --}}
        <div class="row gy-4">
            @foreach($teams->where('orden', '>', 0) as $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch"
                 data-aos="fade-up">

                <div class="team-member d-flex flex-column align-items-center w-100">
                    <div class="member-img">
                        <img src="{{ asset('imagenes_autoridades/'.$item->imagen) }}"
                             class="img-fluid"
                             alt="{{ $item->nombre }}">
                    </div>

                    <div class="member-info text-center">
                        <h4>{{ $item->cargo }}</h4>
                        <h5>{{ $item->nombre }}</h5>
                        <span style="font-style: italic;">
                            {{ $item->email ?? '- - - - -' }}
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>

</section>


@endsection
