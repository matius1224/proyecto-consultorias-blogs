@section('title', __('Detalle del blog'))
<div>

    <body class="service-details-page">
        <main class="main">
            <!-- Page Title -->
            <div class="page-title" data-aos="fade" style="margin-top: 100px; margin-bottom: 50px">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="{{ route('blogDashboard') }}">Blog</a></li>
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
                                ->where('id', $this->id_blog)
                                ->first();

                            $encodedUrl = rawurlencode($url);
                        @endphp
                        <div style="display: flex; justify-content: center">
                            <div>
                                <div style="display: flex; justify-content: space-between; flex-wrap: wrap">
                                    <div>
                                        <img src="{{ asset('storage/' . $blogSeleccionado->imagen_encabezado) }}"
                                            alt="" class="img-fluid" style="object-fit: cover">
                                        <h1 style="margin-top: 30px"><strong>{{ $blogSeleccionado->titulo }}</strong>
                                        </h1>
                                        <h3>{{ $blogSeleccionado->subtitulo }}
                                        </h3>
                                        <p>
                                            {{ $blogSeleccionado->descripcion }}
                                        </p>
                                    </div>

                                    <div style="display: flex; flex-direction: column; width: 100%">
                                        <p class="text-center"><strong>Blogs relacionados que te pueden
                                                interesar</strong></p>
                                        @foreach ($categorias_relacionadas as $categoria)
                                            <div class="card" style="width: 300px; height: 120px;">
                                                <img
                                                    src="{{ asset('storage/' . $categoria->imagen_encabezado) }}" style="object-fit: cover; height: 70px;">
                                                <div class="card-body">
                                                    <a wire:click="irADetalleBlog({{ $categoria->id }})"
                                                        style="cursor: pointer" class="read-more stretched-link">leer
                                                        mas...</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div align="center">
                                    <form wire:submit="comentarBlog" class="php-email-form"
                                        style="height: 350px; margin-top: 50px; width: 400px">
                                        <div class="row gy-4">
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Nombre" required="" wire:model="nombre_usuario">
                                            </div>

                                            <div class="col-md-12">
                                                <textarea class="form-control" name="message" rows="6" placeholder="Comentario" required=""
                                                    wire:model="comentario"></textarea>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <button type="submit" href="#blog">Comentar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <p class="text-center" style="margin-top: 50px"><strong>!Recuerda compartir tu
                                        blog¡</strong></p>
                                <div class="compartir-link">
                                    <div class="social-links d-flex mt-4">
                                        <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}&text={{ $blogSeleccionado->titulo }}"
                                            target="_blank"><i class="bi bi-twitter-x"></i></a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}"
                                            target="_blank"><i class="bi bi-facebook"></i></a>
                                        <a href="mailto:?subject=coyca&body={{ $encodedUrl }}" target="_blank"><i
                                                class="bi bi-envelope"></i></a>
                                        <a href="https://api.whatsapp.com/send?text={{ $encodedUrl }}"
                                            target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    </div>
                                </div>

                                <p class="text-center" style="margin-top: 50px"><strong>Comentarios</strong></p>
                                <hr>
                                <div style="display: flex; justify-content: center; flex-wrap: wrap; margin-bottom: 40px"
                                    id="comentarios">
                                    @foreach ($comentarios as $comentario)
                                        @php
                                            Carbon\Carbon::setLocale('es');
                                            $tiempo_transcurrido_comentario = \Carbon\Carbon::parse(
                                                $comentario->created_at,
                                            )->diffForHumans();
                                        @endphp
                                        <div
                                            style="display: flex; width: 300px; border: 1px solid #388da8; padding: 10px; margin: 0 20px 20px 0;
                                        border-radius: 10px; box-shadow: 5px 10px rgb(218, 217, 217);">
                                            <img src="{{ asset('assets/img/user.png') }}" alt="" width="50px"
                                                height="50px">
                                            <div style="margin-left: 15px">
                                                <p><strong>{{ $comentario->nombre_usuario }}</strong></p>
                                                <p style="margin-top: -20px">{{ $tiempo_transcurrido_comentario }}</p>
                                                <p style="font-size: 18px; word-break: break-all;
                                                word-wrap: break-word">{{ $comentario->comentario }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div style="display: flex; justify-content: center">
                                    {{ $comentarios->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- /Service Details Section -->
        </main>
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
