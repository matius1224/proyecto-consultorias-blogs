<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <header id="header" class="header d-flex align-items-center fixed-top">
            <div class="container-fluid container-xl position-relative d-flex align-items-center">

              <a class="logo d-flex align-items-center me-auto" style="text-decoration: none">
                <img src="assets/img/logo.png" alt="">
                {{-- <h1 class="sitename">QuickStart</h1> --}}
              </a>

              <nav id="navmenu" class="navmenu">
                <ul>
                  <li><a href="{{ route('dashboard') }}" class="">Nosotros</a></li>
                  <li><a href="{{ route('capacitacionesDashboard') }}">Capacitaciones</a></li>
                  <li><a href="{{ route('consultoriasDashboard') }}">Consultorias</a></li>
                  <li><a href="{{ route('blogDashboard') }}">Blog</a></li>
                  <li><a href="{{ route('recursosDashboard') }}">Recursos</a></li>
                  <li><a href="{{ route('contactoDashboard') }}">Contacto</a></li>
                  {{-- <li><a href="{{ route('login') }}" target="_blank">Iniciar sesión</a></li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
              </nav>

              {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}

            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
        <!-- Scroll Top -->
    {{-- <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

    <a href="https://wa.me/50235674276"  class="whatsapp-button d-flex align-items-center justify-content-center" target="_blank">
      <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @livewireScripts
</body>
</html>
