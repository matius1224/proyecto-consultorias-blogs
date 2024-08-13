@section('title', __('Detalle del blog'))
<div>

    <body class="service-details-page">
        <main class="main">
            <!-- Page Title -->
            <div class="page-title" data-aos="fade" style="margin-top: 100px; margin-bottom: 50px">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="#" wire:click="volverABlog">Inicio</a></li>
                            <li class="current">Detalle del blog</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <!-- Service Details Section -->
            <section id="service-details" class="service-details section comentario" style="background-color: #ffffff">
                <div class="container">
                    <div class="row gy-5">
                        @php
                            $blogSeleccionado = DB::table('blog')
                                ->where('id', $this->idBlog)
                                ->first();

                            $encodedUrl = rawurlencode($url);
                        @endphp
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('storage/' . $blogSeleccionado->imagen_encabezado) }}" alt=""
                                class="img-fluid services-img" width="516px" height="327px">
                            <h1><strong>{{ $blogSeleccionado->titulo }}</strong></h1>
                            <h3>{{ $blogSeleccionado->subtitulo }}
                            </h3>
                            <p>
                                {{ $blogSeleccionado->descripcion }}
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <form wire:submit="comentarBlog" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="400" style="height: 350px">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre"
                                            required="" wire:model="nombre_usuario">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Correo electrónico" required="" wire:model="email_usuario">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Comentario" required="" wire:model="comentario"></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit" href="#blog">Comentar</button>
                                    </div>
                                </div>
                            </form>

                            <p class="text-center" style="margin-top: 50px"><strong>!Recuerda compartir tu blog¡</strong></p>
                            <div class="compartir-link">
                                <div class="social-links d-flex mt-4">
                                    {{-- <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}&text={{ $blogSeleccionado->titulo }}"
                                        target="_blank"><i class="bi bi-twitter-x"></i></a> --}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}"
                                        target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="mailto:?subject=coyca&body={{ $encodedUrl }}" target="_blank"><i
                                            class="bi bi-envelope"></i></a>
                                    <a href="https://api.whatsapp.com/send?text={{ $encodedUrl }}" target="_blank"><i
                                            class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Service Details Section -->

        </main>

        <footer id="footer" class="footer position-relative">

            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">Coyca</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>A108 Adam Street</p>
                            <p>New York, NY 535022</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                            <p><strong>Email:</strong> <span>info@example.com</span></p>
                        </div>
                        <div class="social-links d-flex mt-4">
                            {{-- <a href=""><i class="bi bi-twitter-x"></i></a> --}}
                            <a href="https://www.facebook.com/coycagt<"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/coyca_gt?igsh=ejMyN2FxbDc1d3Yw&utm_source=qr"><i class="bi bi-instagram"></i> </a>
                            <a href="https://www.linkedin.com/company/coyca-consultoria-y-capacitacion/?viewAsMember=true"><i class="bi bi-linkedin"></i></a>
                            <a href="https://wa.me/50235674276"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Enlaces útiles</h4>
                        <ul>
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="#">Capacitaciones</a></li>
                            <li><a href="#">Consultorias</a></li>
                            <li><a href="#">Terminos de servicio</a></li>
                            <li><a href="#">Política de privacidad</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-4 col-md-12 footer-newsletter">
                        <h4>nuestro boletín</h4>
                        <p>¡Suscríbete a nuestra newsletter y recibe las últimas novedades sobre nuestros productos y
                            servicios!!</p>
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                    value="Suscribirse"></div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Coyca</strong><span>Todos los derechos
                        reservados</span></p>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Realizado por <a href="#">Estefania</a>
                </div>
            </div>

        </footer>
    </body>
</div>
