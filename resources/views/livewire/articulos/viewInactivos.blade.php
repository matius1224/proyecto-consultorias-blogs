@section('title', __('Articulos'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Articulos</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar">
                </div>
                <label class="switchBtn">
                    <input wire:model.live="activos" id="activos" type="checkbox" class="" name="" />
                    <div class="slide round">Inactivos</div>
                </label>
            </div>

            @include('livewire.articulos.modals')

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
                            <th>Nombre del articulo cargado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($articulosInactivos as $row)
                            <tr>
                                <td>{{ $row->nombre }}</td>
                                <td>
                                    <div class="logo-usuario">
                                        <div class="dropdown blog">
                                            <a class="dropdown-toggle user-toogle" id="blog" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                                <span class="fas fa-grip-vertical"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="blog">
                                                <a class="dropdown-item"
                                                    wire:click="modalActivar({{ $row->id }})"><span
                                                        class="fas fa-check-circle mr-3"></span> Activar </a>
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
            <div class="float-end">{{ $articulosInactivos->links() }}</div>
            <div class="float-start">Mostrando {{ $articulosInactivos->count() }} registros de un total de
                {{ $total }}
            </div>
        </div>
    </div>
</div>
