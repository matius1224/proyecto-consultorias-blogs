@if ($isOpen)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">{{ $selected_id ? 'Editar capacitación' : 'Crear capacitación' }}
                    </h5>
                    <button wire:click="closeModal" type="button" class="btn-close"></button>
                </div>
                <form wire:submit="{{ $selected_id ? 'update' : 'store' }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="imagen_encabezado">* Foto</label>
                                <input type="file" wire:model.live="imagen_encabezado" class="form-control"
                                    accept="image/*">
                                @error('imagen_encabezado')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                                @if ($imagen_encabezado && $crear_capacitacion && !is_string($imagen_encabezado))
                                    <img src="{{ $imagen_encabezado->temporaryUrl() }}" alt="" width="100px"
                                        height="100px" style="margin-top: 10px">
                                @elseif ($selected_id && is_string($imagen_encabezado))
                                    <img src="{{ asset('storage/' . $imagen_encabezado) }}" alt=""
                                        width="100px" height="100px" style="margin-top: 10px">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tema">* Tema</label>
                                <input wire:model="tema" type="text" class="form-control">
                                @error('tema')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">* Descripción</label>
                                <textarea wire:model="descripcion" class="form-control"></textarea>
                                @error('descripcion')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>                            
                            <div class="form-group">
                                <label for="fechasHorarios">* Fechas y horarios</label>
                                <input wire:model="fechasHorarios" type="text" class="form-control">
                                @error('fechasHorarios')
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
                        {{ $activar ? '¿Estas seguro de activar la capacitación?' : '¿Estas seguro de inactivar la capacitación?' }}
                    </h3>
                </div>
                <form wire:submit="{{ $activar ? 'activarCapacitacion' : 'inactivarCapacitacion' }}({{ $selected_id }})">
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
