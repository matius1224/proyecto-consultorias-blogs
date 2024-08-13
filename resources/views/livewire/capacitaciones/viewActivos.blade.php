@section('title', __('Capacitaciones'))
<div class="contenedor" style="margin: auto">
    <div class="card carta-personalizada">   
            <div class="card-body">
                <div class="container-botones-tabla-activos">
                    <div class="buscador-tabla">
                        <input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search"
                            placeholder="Buscar">
                    </div>
                    <div class="container-boton-sincronizar">
                        <button id="boton-sincronizar" wire:click="openModal"><i class="fa fa-plus"></i> Nueva Capacitación</button>
                    </div>
                    <label class="switchBtn">
                        <input wire:model.live="activos" id="activos" type="checkbox" class="" name="" />
                        <div class="slide round">Activos</div>
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
                            @forelse($capacitaciones as $row)
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
                <div class="float-end">{{ $capacitaciones->links() }}</div>
                <div class="float-start">Mostrando {{ $capacitaciones->count() }} registros de un total de {{ $total }}</div>   
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
                text: 'Capacitación creado éxitosamente',
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
                text: 'Capacitación actualizada éxitosamente',
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

