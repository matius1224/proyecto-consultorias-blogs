@section('title', __('Capacitaciones Usuarios'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Capacitaciones Usuarios</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWordUsuarios' type="text" class="form-control" name="search" id="search_uno"
                        placeholder="Buscar">
                </div>
            </div>  
            <div style="margin-top: 20px">
                <select wire:model.live="paginador">
                    <option value="10">10 registros</option>
                    <option value="25">25 registros</option>
                    <option value="50">50 registros</option>
                    <option value="100">100 registros</option>
                    <option value="{{ $totalcapacitacionesXusuarios }}">Todos los registros</option>
                </select>
            </div>

            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Capacitacion</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Cargo</th>
                            <th>Diploma</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($capacitacionesXusuarios as $row)
                            <tr>
                                <td>{{ $row->tema }}</td>
                                <td>{{ $row->nombres_usuario }}</td>
                                <td>{{ $row->apellidos_usuario }}</td>
                                <td>{{ $row->correo_usuario }}</td>
                                <td>{{ $row->empresa_usuario }}</td>
                                <td>{{ $row->cargo_usuario }}</td>
                                <td><button  wire:click="pdf({{ $row->usuario_id }})" wire:loading.attr="disabled"><i class="fa fa-address-card"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="float-end">{{ $capacitacionesXusuarios->links() }}</div>
            <div class="float-start">Mostrando {{ $capacitacionesXusuarios->count() }} registros de un total de {{ $totalcapacitacionesXusuarios}}
        </div>
    </div>
    </div>
</div>

