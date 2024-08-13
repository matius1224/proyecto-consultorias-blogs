@section('title', __('Capacitaciones'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Capacitaciones</h3>
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

            @include('livewire.capacitaciones.modals')

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
                            <th>Tema</th>
                            <th>Descripción</th>
                            <th>Fechas y horarios</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($capacitacionesInactivos as $row)
                            <tr>
                                <td><img src="{{ asset('storage/' . $row->imagen_encabezado) }}" alt=""
                                        width="100px" height="100px"></td>
                                <td>{{ $row->tema }}</td>
                                <td>{{ $row->descripcion }}</td>
                                <td>{{ $row->fechasHorarios }}</td>
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
            <div class="float-end">{{ $capacitacionesInactivos->links() }}</div>
            <div class="float-start">Mostrando {{ $capacitacionesInactivos->count() }} registros de un total de
                {{ $total }}
            </div>
        </div>
    </div>
</div>
