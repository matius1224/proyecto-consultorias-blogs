<div>

    <body id="index-page">
        <main class="main">
            <!-- Contacto -->
            <br><br><br> <br><br><br>
            <section id="contacto" class="contact section" wire:ignore.self>

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up" wire:ignore.self>
                    <h2>Contacto</h2>
                    <p>Escribenos y nosotros te contactaremos</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100" wire:ignore.self>

                    <div class="row gy-4">

                        <div class="col-lg-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="200" wire:ignore.self>
                                <i class="bi bi-geo-alt"></i>
                                <h3>Dirección</h3>
                                <p>2da. Calle 2-80 Zona 15</p>
                                <p>Vista Hermosa 2. 2do. Nivel</p>
                                <p>Oficina 5, Edificio Maria del Alma</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3 col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="300" wire:ignore.self>
                                <i class="bi bi-telephone"></i>
                                <h3>Teléfonos</h3>
                                <p>+502-51166397</p>
                                <p>+502-32507701</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-lg-3 col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="400" wire:ignore.self>
                                <i class="bi bi-envelope"></i>
                                <h3>Correos electronicos</h3>
                                <p>info@coyca-consultoria.com</p>
                                <p>administracion@coyca-consultoria.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="row gy-4 mt-1">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" wire:ignore.self>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.317634997698!2d-90.48964932358497!3d14.580967841234555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a3742bcb3aeb%3A0x78da9ec1cb86ed87!2sEdificio%20Mar%C3%ADa%20del%20Alma!5e0!3m2!1ses!2sco!4v1719433390069!5m2!1ses!2sco"
                                frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!-- End Google Maps -->

                        <div class="col-lg-6">
                            <form wire:submit="store()" class="php-email-form">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre"
                                            required="" wire:model="nombre">
                                        @error('nombre')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="text" class="form-control" name="email" placeholder="WhatsApp"
                                            required="" wire:model="whatsapp">
                                        @error('whatsapp')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="subject" placeholder="Correo"
                                            required="" wire:model="correo">
                                        @error('correo')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Empresa"
                                            required="" wire:model="empresa">
                                        @error('empresa')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Tema de interés" required=""
                                            wire:model="tema_interes"></textarea>
                                        @error('tema_interes')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button type="submit">Contactar</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>

            </section><!-- /Contact Section -->
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('eventoCrear', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'Tu solicitud ha sido enviada',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
