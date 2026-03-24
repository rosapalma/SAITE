<!-- MODAL Editar y nuevo-->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg z-50" style=""> 
       <img src="{{asset('images/ICONS/close.png')}}" wire:click="closeModal()" width="30" style=" float: right;cursor: pointer;" >
        <x-validation-errors class="mb-4" />
        <form wire:submit.prevent="store">
            <div class="p-6">
                <h1 class="title text-lg font-bold mb-4 text-center">{{ $user_id ? 'EDITAR USUARIO' : 'REGISTRAR USUARIO' }}</h1>

            <div>  
            <div>
                <label class="label-blue">CEDULA</label>
                <input type="text" wire:model.live="cedula" class="form-control">
            </div>   
            <div>
                <label class="label-blue text-center">NOMBRE Y APELLIDO</label>
                <input type="text" wire:model.live="full_name" class="form-control" >
            </div> 
            <div>
                <label class="label-blue">CORREO INSTITUCIONAL</label>
                <input type="email" wire:model.live="email" class="form-control" placeholder="usuario.ipm@upel.edu.ve">         
            </div>    
            <div>
                <label class="label-blue">CARGO</label>
                <input type="text" wire:model.live="cargo" class="form-control " >
            </div>
            <div style="display: flex;">
            <div>
                <label class="label-blue">UBICACION</label>
                <select wire:model.live="ubicacion_id" required class="form-control" >
                    <option value="">Seleccione</option>
                    @foreach ($ubicacions as $dp)
                        <option value="{{$dp->id}}">{{$dp->name}}</option>
                    @endforeach
                </select>
            </div> 
        
            <div>
                <label class="label-blue">TIPO DE USUARIO</label>
                <select wire:model.live="privilege" required class="form-control" >
                    <option value="">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Gestor</option>
                    <option value="3">Tecnico de Soporte</option>
                    <option value="4">Usuario de recursos</option> 
                </select>
            </div> 
        </div>

         <div class="mt-4">
            <label class="label-blue">CONTRASEÑA</label>
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model.live="password" required autocomplete="new-password"  placeholder="*********"/>
                 <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model.live="password_confirmation" required autocomplete="new-password" placeholder="CONFIRMAR CONTRASEÑA" />
            </div>






            <div class="p-4 bg-gray-50 flex justify-end">
                <x-button> GUARDAR</x-button>
            </div>
        </form>
        
    </div>
</div>