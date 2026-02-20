<!-- MODAL Editar y nuevo-->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        <x-validation-errors class="mb-4" />
        <form wire:submit.prevent="">
        
            <div class="p-4 bg-gray-50 flex justify-end">
                <button type="button" wire:click="" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success"> Guardar</button>
            </div>
        </form>
    </div>
</div>   <!-- MODAL Editar y nuevo-->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        <x-validation-errors class="mb-4" />
        <form wire:submit.prevent="store">
            <div class="p-6">
                <h2 class="text-lg font-bold mb-4">{{ $user_id ? 'Editar Registro de Usuario' : 'Registrar Nuevo Usuario' }}</h2>
            <div>
                <label>Nombre y Apellido</label>
                        <input type="text" wire:model.live="full_name" >
            </div>
            <div>
                <label>Cédula</label>
                <input type="text" wire:model.live="cedula">
            </div>
            <div>
                <label>Correo Institucional</label>
                <input type="email" wire:model.live="email">
            </div>
            <div>
                <label>Dependencia</label>
                <select wire:model.live="ubicacion_id" required>
                    <option value="">Seleccione</option>
                    @foreach ($ubicacions as $dp)
                        <option value="{{$dp->id}}">{{$dp->name}}</option>
                    @endforeach
                </select>
            </div> 
            <div>
                <label>Cargo</label>
                <input type="text" wire:model.live="cargo">
            </div>
            <div>
                <label>Privilegio</label>
                <select wire:model.live="privilege" required>
                    <option value="">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Gestor</option>
                    <option value="3">Tecnico de Soporte</option>
                    <option value="4">Usuario de recursos</option>
                   
                </select>
            </div> 

         <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model.live="password" required autocomplete="new-password"  placeholder="CONTRASEÑA"/>
                <label class="text-muted">
                  Tu contraseña debe contener 8 o mas caracteres.
                </label>
                 <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model.live="password_confirmation" required autocomplete="new-password" placeholder="CONFIRMAR CONTRASEÑA" />
            </div>






            <div class="p-4 bg-gray-50 flex justify-end">
                <button type="button" wire:click="closeModal()" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success"> Guardar</button>
            </div>
        </form>
    </div>
</div>