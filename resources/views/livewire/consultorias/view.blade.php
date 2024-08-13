@section('title', __('Consultorias'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Consultorias</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWord' type="text" class="form-control" name="search" id="search"
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
            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>WhatsApp</th>
                            <th>Empresa</th>
                            <th>Area</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($consultorias as $row)
                            <tr>
                                <td>{{ $row->nombres }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->whatsapp }}</td>
                                <td>{{ $row->empresa }}</td>
                                <td>{{ $row->nombre }}</td>
                                <td>{{ $row->descripcion_consultoria }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="float-end">{{ $consultorias->links() }}</div>
            <div class="float-start">Mostrando {{ $consultorias->count() }} registros de un total de {{ $total }}
            </div>
        </div>
    </div>
</div>

