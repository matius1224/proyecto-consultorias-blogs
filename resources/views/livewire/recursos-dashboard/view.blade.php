@section('title', __('recursosHome'))
<div>

    <body id="index-page">

        <main class="main">
            <!-- Recursos -->
            <br><br><br> <br><br><br>
            <section id="recursos" class="pricing section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up" wire:ignore.self>
                    <h2>Recursos</h2>
                    <p>Accede a material gratuito</p>
                </div><!-- End Section Title -->

                <div class="container">
                    @include('livewire.recursos-dashboard.modals')
                    <div class="row gy-4">

                        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100" wire:ignore.self>
                            <div class="pricing-item">
                                <h3>Formatos/plantillas</h3>
                                <p class="description">presiona el boton para llenar el formato</p>
                                @foreach ($recursos as $recurso)
                                    <a wire:click="abrirFormularioRecurso('{{ $recurso->ruta_archivo }}','{{$recurso->id}}')" style="cursor: pointer"
                                        class="cta-btn">{{ $recurso->nombre }}</a>
                                @endforeach
                            </div>
                        </div><!-- End Pricing Item -->

                        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300" wire:ignore.self>
                            <div class="pricing-item">
                                <h3>Artículos</h3>
                                <p class="description">Presiona el boton para llenar el formato</p>
                                @foreach ($articulos as $articulo)
                                    <a wire:click="abrirFormularioArticulo('{{ $articulo->ruta_archivo }}','{{$articulo->id}}')" style="cursor: pointer"
                                        class="cta-btn">{{ $articulo->nombre }}</a>
                                @endforeach
                            </div>
                        </div><!-- End Pricing Item -->

                    </div>

                </div>
            </section>
            <br><br><br> <br><br><br>
        </main>
        <footer id="footer" class="footer position-relative">
          <div class="container footer-top">
            <div class="row gy-4">
              <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                  <span class="sitename">Coyca</span>
                </a>
                <div class="footer-contact pt-3">
                  <p>2da. Calle 2-80 Zona 15</p>
                  <p>Vista Hermosa 2. 2do. Nivel</p>
                  <p>Oficina 5, Edificio Maria del Alma</p>
                </div>
              </div>
      
              <div class="col-lg-2 col-md-3 footer-links">
                <h4>Teléfonos:</h4>
                <ul>
                  <li><a href="#">+502-51166397</a></li>
                  <li><a href="#">+502-32507701</a></li>
                </ul>
              </div>
      
              <div class="col-lg-2 col-md-3 footer-links">
                <h4>Correos electronicos:</h4>
                <ul>
                  <li><a href="#">info@coyca-consultoria.com</a></li>
                  <li><a href="#">administracion@coyca-consultoria.com</a></li>
                </ul>
              </div>
      
              <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Siguenos!</h4>
                <p>en nuestras redes sociales</p>
                <div class="social-links d-flex mt-4">
                  {{-- <a href=""><i class="bi bi-twitter-x"></i></a> --}}
                  <a href="https://www.facebook.com/coycagt<"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/coyca_gt?igsh=ejMyN2FxbDc1d3Yw&utm_source=qr"><i class="bi bi-instagram"></i> </a>
                  <a href="https://www.linkedin.com/company/coyca-consultoria-y-capacitacion/?viewAsMember=true"><i class="bi bi-linkedin"></i></a>
                  <a href="https://wa.me/50235674276"><i class="bi bi-whatsapp"></i></a>
                </div>
              </div>
      
            </div>
          </div>
      
          <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Coyca</strong><span>Todos los derechos reservados</span></p>
            <div class="credits">
            </div>
          </div>
      
      </footer>
    </body>
</div>
