@if ($isOpen)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">{{ $selected_id ? 'Editar area' : 'Crear area' }}
                    </h5>
                    <button wire:click="closeModal" type="button" class="btn-close"></button>
                </div>
                <form wire:submit="{{ $selected_id ? 'update' : 'store' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="nombre">* Nombre</label>
                                <input wire:model="nombre" type="text" class="form-control">
                                @error('nombre')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal"
                            class="btn btn-secondary close-btn">Cancelar</button>
                        <button type="submit"
                            class="btn boton-guardar-foto">{{ $selected_id ? 'Actualizar' : 'Crear' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endif

{{-- Modal activar/inactivar --}}
@if ($isOpenModalActivarInactivar)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">
                        {{ $activar ? '¿Estas seguro de activar el area?' : '¿Estas seguro de inactivar el area?' }}
                    </h3>
                </div>
                <form wire:submit="{{ $activar ? 'activarArea' : 'inactivarArea' }}({{ $selected_id }})">
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn boton-guardar-foto">Si</button>
                        <button type="button" wire:click="closeModalActivarInactivar"
                            class="btn btn-secondary close-btn">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endif
