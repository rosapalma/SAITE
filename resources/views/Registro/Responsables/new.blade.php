  <!-- MODAL -->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
           	<x-validation-errors class="mb-4" />
            <form wire:submit.prevent="store">
                <div class="p-6">
                     <h2 class="text-lg font-bold mb-4"> 'Nuevo Registro'</h2>
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
                    <label>Departamento</label>
    			    <select wire:model.live="departamento_id" required>
       	         	    <option value="">Seleccione</option>
       	         	    @foreach ($dptos as $dp)
    				    <option value="{{$dp->id}}">{{$dp->name}}</option>
    				    @endforeach
    				    </select>
                    </div>
                    <div>
                    	<input type="date" id="start" name="fecha_asig" value="2018-07-22" />fecha de asignacion
                    </div>
                    <div class="p-4 bg-gray-50 flex justify-end">
                        <button type="button" wire:click="closenew()" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-success"> Guardar</button>
                    </div>
                </form>
            </div>
</div>