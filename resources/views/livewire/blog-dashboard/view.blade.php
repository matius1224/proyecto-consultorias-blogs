@section('title', __('blogHome'))
<div>

    <body id="index-page">
        <main class="main">
            <!-- Blog -->
            <section id="blog" class="services section" style="margin-top: 120px; margin-bottom: 50px">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up" wire:ignore.self>
                    <h2>Blog</h2>
                    {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
                </div><!-- End Section Title -->

                <div class="filtro-categoria">
                    <div>
                        <p class="text-center"><strong>Filtra por categoria</strong></p>
                        <select wire:model.live="id_categoria" class="form-control">
                            <option value="">Seleccione la categoria</option>
                            @foreach ($categorias as $row)
                                <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_categoria')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="scroll-blogs">
                    @foreach ($blogs as $row)
                        <div class="container" style="width: 430px">
                            <div class="row">
                                <div data-aos="fade-up" data-aos-delay="100" wire:ignore.self>
                                    <div class="card" style="width: 450px">
                                        <img class="card-img-top img-fluid"
                                            src="{{ asset('storage/' . $row->imagen_encabezado) }}" alt="Card image cap" style="object-fit: cover;
                                            height: 250px;">
                                        <div class="card-body">
                                            @php
                                                Carbon\Carbon::setLocale('es');
                                                $fecha = \Carbon\Carbon::parse($row->created_at)->format('M d, Y');
                                                $tiempo_de_creacion = \Carbon\Carbon::parse($row->created_at)->diffForHumans();
                                            @endphp
                                            <p>{{$fecha}} - {{$tiempo_de_creacion}}</p>
                                            <h2 class="card-title">{{ $row->titulo }}</h2>
                                            <a wire:click="irADetalleBlog({{ $row->id }})" style="cursor: pointer"
                                                class="read-more stretched-link">leer mas <i
                                                    class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div><!-- End Service Item -->
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="display: flex; justify-content: center">
                    {{$blogs->links()}}
                </div>

            </section><!-- /Services Section -->

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
        Livewire.on('eventoComentar', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'El blog ha sido comentado exitosamente',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
