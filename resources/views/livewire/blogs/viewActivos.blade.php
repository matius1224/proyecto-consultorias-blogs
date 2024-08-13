@section('title', __('Blog'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Blog</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar">
                </div>
                <div class="container-boton-sincronizar">
                    <button id="boton-sincronizar" wire:click="openModal"><i class="fa fa-plus"></i> Nuevo blog</button>
                </div>
                <label class="switchBtn">
                    <input wire:model.live="activos" id="activos" type="checkbox" class="" name="" />
                    <div class="slide round">Activos</div>
                </label>
            </div>

            @include('livewire.blogs.modals')

            <div style="margin-top: 20px">
                <select wire:model.live="paginador">
                    <option value="10">10 registros</option>
                    <option value="25">25 registros</option>
                    <option value="50">50 registros</option>
                    <option value="100">100 registros</option>
                    <option value="{{ $total }}">Todos los registros</option>
                </select>
            </div>

            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Foto cargada</th>
                            <th>Titulo</th>
                            <th>Subtitulo</th>
                            <th>Descripción</th>
                            <th>Categoria asignada</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($blogs as $row)
                            <tr>
                                <td><img src="{{ asset('storage/' . $row->imagen_encabezado) }}" alt=""
                                        width="100px" height="100px"></td>
                                <td>{{ $row->titulo }}</td>
                                <td>{{ $row->subtitulo }}</td>
                                <td>{{ $row->descripcion }}</td>
                                @php
                                    $nombre_categoria = DB::table('categorias')
                                        ->where('id', $row->id_categoria)
                                        ->pluck('nombre')
                                        ->first();
                                @endphp
                                <td>{{ $nombre_categoria }}</td>
                                <td>
                                    <div class="logo-usuario">
                                        <div class="dropdown blog">
                                            <a class="dropdown-toggle user-toogle" id="blog" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                                <span class="fas fa-grip-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="blog">
                                                <a class="dropdown-item" wire:click="edit({{ $row->id }})"><span
                                                        class="fas fa-pencil-alt mr-3"></span>Editar</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    wire:click="modalInactivar({{ $row->id }})"><span
                                                        class="fas fa-exclamation-circle mr-3"></span> Inactivar </a>
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
            <div class="float-end">{{ $blogs->links() }}</div>
            <div class="float-start">Mostrando {{ $blogs->count() }} registros de un total de {{ $total }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('eventoInactivar', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'Ha sido inactivado con éxito.',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        });
    });

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
        Livewire.on('eventoCrear', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'Blog creado éxitosamente',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                // Recargar la página después de que se cierre el Swal
                location.reload();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('eventoActualizar', () => {
            Swal.fire({
                title: 'Coyca',
                text: 'Blog actualizado éxitosamente',
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                // Recargar la página después de que se cierre el Swal
                location.reload();
            });
        });
    });
</script>
