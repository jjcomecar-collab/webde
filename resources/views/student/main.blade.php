<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Mi Sitio')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="{{ asset('student/main/assets/img/logoderecho.png') }}" rel="icon">
  <link href="{{ asset('student/main/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('student/main/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('student/main/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('student/main/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('student/main/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('student/main/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('student/main/assets/css/main.css') }}" rel="stylesheet">


<!-- 🔥 AGREGA ESTO -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

  @yield('css')



  <!-- IMG-TEXT-IMG CSS  -->
  <link href="{{ asset('student/part-other/img-text-img/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('student/part-other/img-text-img/me.css') }}" rel="stylesheet">


  <!-- NUMEROS CSS  -->
  <link href="{{ asset('student/part-other/numeros/numero.css') }}" rel="stylesheet">


  <!-- STYLES - RUN AUTO -->
  <link href="{{ asset('student/part-other/runauto/assets/css/runautostyles.css') }}" rel="stylesheet">

 
</head>











<body class="index-page">


    <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="{{route('inicio')}}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('student/main/assets/img/logoderecho.png') }}" alt="" >
        <!-- <h1 class="sitename">joel</h1><span>.</span> -->
      </a>
      
      <nav id="navmenu" class="navmenu">
        <ul>
          <li class="dropdown"><a href="javascript:void(0)"><span>FACULTAD</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('student.modulo', 'presentacion') }}">Presentacion</a></li>
              <li><a href="{{ route('student.modulo', 'visionmision') }}">Visión-Misión</a></li>
              <li><a href="{{route('historia')}}">Historia</a></li>
              <li><a href="{{route('organigrama')}}">Organigrama</a></li>
              <li><a href="{{route('autoridade')}}">Autoridades</a></li>
              <li><a href="{{route('administrativo')}}">Administrativos</a></li>
              <li class="dropdown"><a href="#"><span>Docentes</span> <i class="bi bi-chevron-down toggle-dropdown_2"></i></a>
                <ul>
                  <li><a href="{{route('docentederecho')}}"><span>Derecho</span></a></li>
                  <li><a href="{{route('docentepolitica')}}">Ciencia Política</a></li>
                </ul>
              </li>
            </ul>
          </li>

            

          <li class="dropdown"><a href="javascript:void(0)"><span>ORGANIZACIÓN</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('student.modulo', 'consejofacultad') }}">Consejo Facultad</a></li>
                <li><a href="{{route('decanofun')}}">Decano</a></li>
                <li><a href="{{route('administradorfun')}}">Administrador</a></li>
                <li class="dropdown"><a href=""><span>Administración</span> <i class="bi bi-chevron-down toggle-dropdown_2"></i></a>
                    <ul>
                        <li><a href="{{route('poi')}}"><span>POI</span></a></li>
                    </ul>
                </li>
                
                <li><a href="{{route('departamento')}}">Departamento Derecho</a></li>

                <li class="dropdown"><a href="#"><span>Repr. Estudiantil</span> <i class="bi bi-chevron-down toggle-dropdown_2"></i></a>
                    <ul>
                        <li><a href="{{ route('student.modulo', 'reprederecho') }}">DERECHO</a></li>
                        <li><a href="{{route('reprepolitica')}}">CIENCIA POLÍTICA</a></li>
                    </ul>
                </li>
                <li><a href="{{route('responsocial')}}">Responsabilidad Social</a></li>
                <li><a href="{{ route('student.modulo', 'tramitecosto') }}">Tramites / Costos</a></li>

                <li class="dropdown"><a href="#"><span>Comités-Comisiones - </span> <i class="bi bi-chevron-down toggle-dropdown_2"></i></a>
                  <ul>
                      <li><a href="{{ route('student.modulo', 'comite') }}">COMITES</a></li>
                      <li><a href="{{ route('student.modulo', 'rsu') }}">RSU</a></li>
                      <li><a href="{{ route('student.modulo', 'tutoria') }}">TUTORIA</a></li>
                  </ul>
                </li>
                <li><a href="{{route('circulo')}}">Circulos de Investigación</a></li>   <!-- AGREGADO -->
                <li><a href="https://transparencia.unitru.edu.pe/doc/FUT.pdf" target="_blank" class="text-warning"><strong>F U T</strong></a></li>
            </ul>
          </li> 


          <li class="dropdown"><a href="javascript:void(0)"><span>CARRERA</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('student.modulo', 'derecho') }}">DERECHO</a></li>
              <li><a href="{{ route('student.modulo', 'politica') }}">POLITICA</a></li>
            </ul>
          </li>


          <li><a href="https://www.epgunitru.edu.pe/" target="_blank">POSTGRADO</a></li>


          <li class="dropdown"><a href="javascript:void(0)"><span>INVESTIGACIÓN</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{route('linea')}}">Lineas Inv.</a></li>
              <li><a href="{{ route('student.modulo', 'estructura') }}">Estructura - Esquemas</a></li>
            </ul>
          </li>


          <li class="dropdown"><a href="javascript:void(0)"><span>CALIDAD</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('student.modulo', 'estandares') }}">Estandares</a></li>
              <li><a href="{{ route('student.modulo', 'use') }}">USE</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="javascript:void(0)"><span>TRANSPARENCIA</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('student.modulo', 'normatividad') }}">Normatividad</a></li>
              
            </ul>
          </li>

          <li><a href="{{ route('student.modulo', 'cepejup') }}">CEPEJUP</a></li>
          <li><a href="{{ route('student.modulo', 'acreditacion') }}">ACREDITACION</a></li>
          <li><a href="https://useder.unitru.edu.pe/" target="_blank">2ª ESP. DERECHO</a></li>

        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

      </nav>

    </div>
  </header>



  <main class="main">
    @yield('content')
  </main>







  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-6 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="text-bienv">Facultad de Derecho y Ciencias Políticas</span>
            
          </a>
          <div class="footer-contact pt-3">
            <p>Av. Juan Pablo II S/N Urb. San Andrés Trujillo - La Libertad</p>
            <!-- <p>New York, NY 535022</p>
            <p>New York, NY 535022</p> -->
            <!-- <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p> -->
            <p><strong>Email:</strong> <span>facder@unitru.edu.pe</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="javascript:void(0)"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/facderechount/?locale=es_LA" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="javascript:void(0)"><i class="bi bi-instagram"></i></a>
            <a href="javascript:void(0)"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>


        <div class="col-lg-2 col-md-3 footer-links">
          <h4><em>Escuela de Derecho</em></h4>
          <ul>
            <li><a href="#" onclick="return false;">derecho@unitru.edu.pe</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><em>Escuela de Ciencias Políticas</em></h4>
          <ul>
            <li><a href="#" onclick="return false;">politica@unitru.edu.pe</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><em>Centro de Proyección y Extensión Jurídico Político</em></h4>
          <ul>
            <li><a href="#" onclick="return false;">consultoriojuridicogratuito@unitru.edu.pe</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links ms-auto">
          <h4><em>Segunda Especialidad de Derecho</em></h4>
          <ul>
            <li><a href="#" onclick="return false;">se.derecho@unitru.edu.pe</a></li>
          </ul>
        </div>



        


      </div>
    </div>


    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">2026 Facultad de Derecho y CC.PP.</strong> <span>Todos los derechos reservados</span></p>
      <div class="credits">
        Designed by <a href="javascript:void(0)">jjcr</a> 
      </div>
    </div>

  </footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{ asset('student/main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('student/main/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('student/main/assets/js/main.js') }}"></script>


  @yield('js')

  
  <!-- IMG-TEXT-IMG JS Files -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="{{ asset('student/part-other/img-text-img/wow.min.js') }}"></script>
  <script src="{{ asset('student/part-other/img-text-img/main.js') }}"></script>

</body>

</html>