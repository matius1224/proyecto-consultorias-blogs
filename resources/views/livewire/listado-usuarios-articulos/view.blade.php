@section('title', __('Listado de usuarios por articulo'))
<div class="contenedor">
    <div class="card carta-personalizada">
        <div class="card-header">
            <h3 class="titulos-container text-center">Usuarios que descargaron articulos</h3>
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

            <div class="table-responsive container-tabla tablas-generales">
                <table class="table table-sm">
                    <thead class="encabezado-tabla">
                        <tr>
                            <th>Nombre completo</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody class="cuerpo-tabla">
                        @forelse($usuariosXArticulos as $row)
                            <tr>
                                <td>{{ $row->nombres_usuario }} {{ $row->apellidos_usuario }}</td>
                                <td>{{ $row->celular_usuario}}</td>
                                <td>{{ $row->correo_usuario }}</td>
                                <td>{{ $row->empresa_usuario }}</td>
                                <td>{{ $row->cargo_usuario }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="float-end">{{ $usuariosXArticulos->links() }}</div>
            <div class="float-start">Mostrando {{ $usuariosXArticulos->count() }} registros de un total de {{ $total }}

        </div>
    </div>
    </div>
</div>

