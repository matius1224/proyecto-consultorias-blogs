@section('title', __('Comentarios Blog'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Comentarios Blog</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWordComentarioBlog' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar">
                </div>
                <label class="switchBtn">
                    <input wire:model.live="activos" id="activos" type="checkbox" class="" name="" />
                    <div class="slide round">Activos</div>
                </label>
            </div>

            @include('livewire.blog-comentado.modals')

            <div style="margin-top: 20px">
                <select wire:model.live="paginador">
                    <option value="10">10 registros</option>
                    <option value="25">25 registros</option>
                    <option value="50">50 registros</option>
                    <option value="100">100 registros</option>
                    <option value="{{ $totalBlogXcomentario }}">Todos los registros</option>
                </select>
            </div>

            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Titulo Blog</th>
                            <th>Nombre usuario</th>
                            <th>Comentario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($blogXcomentariosInactivos as $row)
                            <tr>
                                <td>{{ $row->titulo }}</td>
                                <td>{{ $row->nombre_usuario }}</td>
                                <td>{{ $row->comentario }}</td>
                                <td>
                                    <div class="logo-usuario">
                                        <div class="dropdown blog">
                                            <a class="dropdown-toggle user-toogle" id="blog" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                                <span class="fas fa-grip-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="blog">
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    wire:click="modalActivar({{ $row->comentario_id }})"><span
                                                        class="fas fa-exclamation-circle mr-3"></span> Activar </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="float-end">{{ $blogXcomentariosInactivos->links() }}</div>
            <div class="float-start">Mostrando {{ $blogXcomentariosInactivos->count() }} registros de un total de {{ $totalBlogXcomentario }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('eventoActivar', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'Ha sido activado con éxito.',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('eventoInactivar', () => {
            Swal.fire({
                title: 'Comentario del blog',
                text: 'Ha sido inactivado con éxito.',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
</script>
