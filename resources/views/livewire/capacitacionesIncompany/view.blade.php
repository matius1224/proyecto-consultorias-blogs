@section('title', __('Capacitaciones Incompany'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Capacitaciones Incompany</h3>
        </div>
        <div class="card-body">
            <div class="container-botones-tabla-activos">
                <div class="buscador-tabla">
                    <input wire:model.live='keyWordUsuariosIncompany' type="text" class="form-control" name="search" id="search_dos"
                        placeholder="Buscar">
                </div>
            </div>  
            <div style="margin-top: 20px">
                <select wire:model.live="paginador">
                    <option value="10">10 registros</option>
                    <option value="25">25 registros</option>
                    <option value="50">50 registros</option>
                    <option value="100">100 registros</option>
                    <option value="{{ $totalcapacitacionesIncompanyXusuarios }}">Todos los registros</option>
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
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($capacitacionesIncompanyXusuarios as $row)
                            <tr>
                                <td>{{ $row->nombres_usuario_incompany }}</td>
                                <td>{{ $row->email_usuario_incompany}}</td>
                                <td>{{ $row->whatsapp_usuario_incompany }}</td>
                                <td>{{ $row->empresa_usuario_incompany }}</td>
                                <td>{{ $row->nombre }}</td>
                                <td>{{ $row->descripcion_usuario_incompany }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="float-end">{{ $capacitacionesIncompanyXusuarios->links() }}</div>
            <div class="float-start">Mostrando {{ $capacitacionesIncompanyXusuarios->count() }} registros de un total de {{ $totalcapacitacionesIncompanyXusuarios}}
        
        </div>
    </div>
    </div>
</div>

