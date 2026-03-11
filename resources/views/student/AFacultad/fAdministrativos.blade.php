@extends('student.main')

@section('title', env('APP_NAME'))

@section('content')


<section id="team" class="team section">

    <div class="container">

        <div class="row gy-4">

            @foreach($administrativos as $item)
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 d-flex align-items-stretch"
                 data-aos="fade-up"
                 data-aos-delay="{{ $loop->iteration * 100 }}">

                <div class="team-member">

                    <div class="member-img">
                        <img
                            src="{{ $item->imagen 
                                    ? asset('imagenes_administrativos/'.$item->imagen)
                                    : asset('student/main/assets/img/team/UserImg.png') }}"
                            class="img-fluid"
                            alt="{{ $item->nombre }}">
                    </div>

                    <div class="member-info">
                        <h4>{{ $item->cargo }}</h4>
                        <h5>{{ $item->nombre }}</h5>

                        <span style="font-style: italic;">
                            {{ $item->email ?? '-----' }}
                        </span>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>

</section>



@endsection
