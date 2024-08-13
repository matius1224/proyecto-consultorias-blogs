@if ($isOpen)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">Formulario para descargar el {{ $id_recurso ? 'recurso' : 'articulo' }}
                    </h5>
                    <button wire:click="cerrarFormulario" type="button" class="btn-close"></button>
                </div>
                <form wire:submit="store">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="nombres_usuario">* Nombres</label>
                                <input wire:model.live="nombres_usuario" type="text" class="form-control">
                                @error('nombres_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="apellidos_usuario">* Apellidos</label>
                                <input wire:model.live="apellidos_usuario" type="text" class="form-control">
                                @error('apellidos_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="celular_usuario">* Celular</label>
                                <input wire:model.live="celular_usuario" type="text" class="form-control">
                                @error('celular_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="correo_usuario">* Correo electrónico</label>
                                <input type="text" wire:model.live="correo_usuario" class="form-control">
                                @error('correo_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="empresa_usuario">* Empresa</label>
                                <input type="text" wire:model.live="empresa_usuario" class="form-control">
                                @error('empresa_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cargo_usuario">* Cargo</label>
                                <input type="text" wire:model.live="cargo_usuario" class="form-control">
                                @error('cargo_usuario')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if (
                            $nombres_usuario != null &&
                                $apellidos_usuario != null &&
                                $celular_usuario != null &&
                                $correo_usuario != null &&
                                $empresa_usuario != null &&
                                $cargo_usuario != null)
                            <button type="button" wire:click="cerrarFormulario"
                                class="btn btn-secondary close-btn">Cancelar</button>
                            <button type="submit" class="btn boton-guardar-foto">Descargar</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endif
