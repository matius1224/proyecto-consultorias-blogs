@if ($isOpen)
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataModalLabel">{{ $selected_id ? 'Registrarme' : 'Registrarme' }}
                    </h5>
                    <button wire:click="closeModal" type="button" class="btn-close"></button>
                </div>
                <section id="incompany" class="contact section">
                    <div class="container" data-aos="fade-up" wire:ignore.self wire:ignore.self data-aos-delay="100">
                        <div class="row gy-4 mt-1">
                            <div class="col-lg-12">
                                <form wire:submit="store" class="php-email-form"
                                    data-aos="fade-up" wire:ignore.self wire:ignore.self data-aos-delay="400">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label for="nombres">* Nombres</label> 
                                            <input wire:model="nombres_usuario" type="text" class="form-control" placeholder="Nombres">
                                                @error('nombres_usuario')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                        </div>
                                                            
                                        <div class="col-md-6 ">
                                            <label for="apellidos">* Apellidos</label> 
                                            <input wire:model="apellidos_usuario" type="text" class="form-control" placeholder="Apellidos">
                                            @error('apellidos_usuario')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                    
                                        <div class="col-md-6">
                                                <label for="whatsapp">* Whatsapp</label> 
                                                <input wire:model="whatsapp" type="number" class="form-control" placeholder="Whatsapp">
                                                @error('fecha_nacimiento_usuario')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                        </div>
                    
                                        <div class="col-md-6">
                                            <label for="email">* Email</label> 
                                            <input wire:model="correo_usuario" type="email" class="form-control" placeholder="Correo electronico">
                                                    @error('correo_usuario')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                        </div>
                    
                                        <div class="col-md-12">
                                            <label for="cargo">* Cargo</label>
                                            <input wire:model="cargo_usuario" type="text" class="form-control" placeholder="Cargo">
                                            @error('cargo_usuario')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                    
                                        <div class="col-md-12">
                                            <label for="empresa">* Empresa</label>
                                            <input wire:model="empresa_usuario" type="text" class="form-control" placeholder="Empresa">
                                                    @error('empresa_usuario')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                        </div>
                                       
                                        <div class="col-md-12 text-center">
                                            <button style="color: var(--contrast-color); background: var(--accent-color); border: 0;  padding: 10px 30px;  transition: 0.4s;  border-radius: 50px;" type="submit">{{ $selected_id ? 'Registrarme' : 'Registrarme' }}</button>
                                        </div>
                    
                                    </div>
                                </form>
                            </div><!-- End Contact Form -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endif



