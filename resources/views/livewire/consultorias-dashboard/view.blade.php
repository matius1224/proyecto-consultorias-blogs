@section('title', __('consultoriasHome'))
<div>

    <body id="index-page">

        <main class="main">
            <br><br><br>  <br><br><br>
            <section id="consultorias" class="more-features section">
                <div class="container">
                    <div class="row justify-content-around gy-4">
                        <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1"
                            data-aos="fade-up" wire:ignore.self data-aos-delay="100">
                            <h3>Áreas y temas por abordar</h3>
                            <p>Nos enfocamos en distintas areas de su empresa</p>

                            <div class="row">

                                <div class="col-lg-6 icon-box d-flex">
                                    <i class="bi bi-easel flex-shrink-0"></i>
                                    <div>
                                        <h4>Sistemas de gestión</h4>
                                        <ul>
                                            <li><span>Salud y seguridad ocupacional</span></li>
                                            <li><span>Gestión de la calidad</span></li>
                                            <li><span>Gestión de la inocuidad</span></li>
                                            <li><span>Medio ambiente</span></li>
                                            <li><span>SMETA 4 pilares</span></li>
                                            <li><span>BPM</span></li>
                                            <li><span>Kaizen</span></li>
                                            <li><span>Balanced ScoreCard</span></li>
                                        </ul>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-lg-6 icon-box d-flex">
                                    <i class="bi bi-patch-check flex-shrink-0"></i>
                                    <div>
                                        <h4>Mercadeo y ventas</h4>
                                        <ul>
                                            <li><span>MK digital (RR.SS., SEO, SEM)</span></li>
                                            <li><span>Desarrollo y creación de productos</span></li>
                                            <li><span>GEstrategias mercadológicas</span></li>
                                            <li><span>Branding y posicionamiento</span></li>
                                            <li><span>SAnálisis del consumidor y experiencia del usuario</span></li>
                                            <li><span>Desarrollo de fuerza de ventas</span></li>
                                            <li><span>Publicidad</span></li>
                                            <li><span>Balanced ScoreCard</span></li>
                                        </ul>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-lg-6 icon-box d-flex">
                                    <i class="bi bi-brightness-high flex-shrink-0"></i>
                                    <div>
                                        <h4>Desarrollo personal</h4>
                                        <ul>
                                            <li><span>Liderazgo</span></li>
                                            <li><span>Coach y cohesión de equipos</span></li>
                                            <li><span>Inteligencia emocional</span></li>
                                            <li><span>Manejo de crisis </span></li>
                                            <li><span>Comunicación efectiva</span></li>
                                            <li><span>Habilidades gerenciales y directivas</span></li>
                                            <li><span>Habilidades blandas</span></li>
                                        </ul>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-lg-6 icon-box d-flex">
                                    <i class="bi bi-brightness-high flex-shrink-0"></i>
                                    <div>
                                        <h4>Management</h4>
                                        <ul>
                                            <li><span>Planeación estratégica y dirección</span></li>
                                            <li><span>Procesos de Recursos Humanos</span></li>
                                            <li><span>Finanzas</span></li>
                                            <li><span>Operaciones</span></li>
                                            <li><span>Medición de tiempos y movimientos</span></li>
                                            <li><span>Logística</span></li>
                                            <li><span>Desarrollo organizacional</span></li>
                                        </ul>
                                    </div>
                                </div><!-- End Icon Box -->

                            </div>

                        </div>

                        <div class="features-image col-lg-5 order-1 order-lg-2" wire:ignore.self data-aos="fade-up"
                            data-aos-delay="200">
                            <img src="assets/img/tabs-5.jpg" alt="">
                        </div>

                    </div>

                </div>

            </section>

            {{-- linea de tiempo --}}
            <br><br><br> <br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section Title -->
                            <div class="container section-title" wire:ignore.self data-aos="fade-up">
                                <h2>Método de trabajo</h2>
                                <p>Nuestro método esta ideado para lograr el éxito</p>
                            </div><!-- End Section Title -->

                            <div class="hori-timeline" dir="ltr">
                                <ul class="list-inline events">
                                    <li class="list-inline-item event-list">
                                        <div class="px-4">
                                            <div class="event-date bg-soft-primary text-primary">1</div>
                                            <h5 class="font-size-16">Diagnóstico</h5>
                                            <p class="text-muted">Conversatorio de las Oportunidades de mejora y planeación estratégica</p>
                                            <div>
                                                {{-- <a href="#" class="btn btn-primary btn-sm">Read more</a> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item event-list" style="position: relative; bottom: 60px">
                                        <div class="px-4">
                                            <div class="event-date bg-soft-success text-success">2</div>
                                            <h5 class="font-size-16">Desarrollo de la asesoría</h5>
                                            <p class="text-muted">Acompañamiento y apoyo</p>
                                            <div>
                                                {{-- <a href="#" class="btn btn-primary btn-sm">Read more</a> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item event-list" style="position: relative; bottom: 25px">
                                        <div class="px-4">
                                            <div class="event-date bg-soft-danger text-danger">3</div>
                                            <h5 class="font-size-16">Informe</h5>
                                            <p class="text-muted">Medición de los resultados</p>
                                            <div>
                                                {{-- <a href="#" class="btn btn-primary btn-sm">Read more</a> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item event-list" style="position: relative; bottom: 60px">
                                        <div class="px-4">
                                            <div class="event-date bg-soft-warning text-warning">4</div>
                                            <h5 class="font-size-16">Resultados</h5>
                                            <p class="text-muted">Visualización de los resultados logrados </p>
                                            <div>
                                                {{-- <a href="#" class="btn btn-primary btn-sm">Read more</a> --}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
        {{-- fin linea de tiempo --}}

        <!-- Servicios InCompany -->
        <br><br><br>
        <section id="services_incompany" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" wire:ignore.self data-aos="fade-up">
                <h2>Servicios InCompany</h2>
                <p>Impulsamos el éxito de tus equipos a través de consultorías a la medida, con metodologías
                    vanguardistas y temas avanzados, ponte en contacto, tenemos una solución a la medida.</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up"  wire:ignore.self data-aos-delay="100">
                <div class="row gy-4 mt-1">
                    <div class="col-lg-12">
                        <form  wire:submit="{{'store'}}" class="php-email-form"
                            data-aos="fade-up" wire:ignore.self data-aos-delay="400">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="id_area">* Nombres</label>
                                    <input wire:model="nombres" type="text" name="name" class="form-control"
                                        placeholder="Nombres y apellidos" required="">
                                       @error('nombres')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6 ">
                                    <label for="id_area">* Email</label>
                                    <input wire:model="email" type="email" class="form-control" name="email"
                                        placeholder="Email" required="">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="id_area">* WhatsApp</label>
                                    <input wire:model="whatsApp" type="text" name="whatsApp" class="form-control"
                                        placeholder="WhatsApp" required="">
                                    @error('whatsApp')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="id_area">* Empresa</label>
                                    <input wire:model="empresa" type="text" name="Empresa" class="form-control"
                                        placeholder="Empresa" required="">
                                    @error('empresa')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    {{-- <input type="text" class="form-control" name="tema"
                                        placeholder="tema o área de interés (desplegable de las áreas)"
                                        required=""> --}}
                                    <label for="id_area">* Areas</label>
                                    <select wire:model="id_area" class="form-control">
                                        <option value="">Seleccione el area</option>
                                        @foreach ($areas as $row)
                                            <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_area')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="id_area">* Descripción</label>
                                    <textarea wire:model="descripcion_consultoria" class="form-control" name="message" rows="6" placeholder="Descríbanos su requerimiento por favor"
                                        ></textarea>
                                    @error('descripcion_consultoria')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit">Enviar</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

        </main>
        <br><br><br>
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
                text: 'Te has registrado con exito!!!',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
