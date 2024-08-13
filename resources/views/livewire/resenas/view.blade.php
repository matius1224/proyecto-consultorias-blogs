@section('title', __('Listado de reseñas'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Reseñas</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search_dos"
                        placeholder="Buscar">
                </div>
            </div>
            <div style="margin-top: 20px">
                <select wire:model.live="paginador">
                    <option value="10">10 registros</option>
                    <option value="25">25 registros</option>
                    <option value="50">50 registros</option>
                    <option value="100">100 registros</option>
                    <option value="{{ $total }}">Todos los registros</option>
                </select>
            </div>

            @include('livewire.resenas.modals')

            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Reseñas de la página web</th>
                            <th>Calificación</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($resenas as $row)
                            <tr>
                                <td>{{ $row->comentario_usuario }}</td>
                                <td>
                                    @for ($i = 1; $i <= $row->calificacion; $i++)
                                        <i class="fas fa-star" style="color: #ffc600"></i>
                                    @endfor
                                </td>
                                <td>
                                    <div class="logo-usuario">
                                        <div class="dropdown blog">
                                            <a class="dropdown-toggle user-toogle" id="blog" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                                <span class="fas fa-grip-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="blog">
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
            <div class="float-end">{{ $resenas->links() }}</div>
            <div class="float-start">Mostrando {{ $resenas->count() }} registros de un total de {{ $total }}

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
</script>
