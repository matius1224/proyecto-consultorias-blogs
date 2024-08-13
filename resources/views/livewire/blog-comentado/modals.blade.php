
{{-- Modal activar/inactivar --}}
@if ($isOpenModalActivarInactivar)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">
                        {{ $activar ? '¿Estas seguro de activar el comentario?' : '¿Estas seguro de inactivar el comentario?' }}
                    </h3>
                </div>
                <form wire:submit="{{ $activar ? 'activarComentarioBlog' : 'inactivarComentarioBlog' }}({{ $selected_id }})">
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
