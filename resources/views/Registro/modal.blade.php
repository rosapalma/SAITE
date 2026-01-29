   <!-- MODAL -->
      
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
            	<x-validation-errors class="mb-4" />
                <form wire:submit.prevent="store">
                    <div class="p-6">
                        <h2 class="text-lg font-bold mb-4">{{ $equipo_id ? 'Editar Registro' : 'Nuevo Registro' }}</h2>
				    <div>
				    	<label>Marca</label>
				    	<input type="text" wire:model.live="marca">
				    </div>
				    <div>
				    	<label>Modelo</label>
				    	<input type="text" wire:model.live="modelo">
				    </div>
				    <div>
				        <label>Serial</label>
				        <input type="text" wire:model.live="serial" wire:model.live="serial">
				    </div>
				    <div>
				    	<label>Serial de Bienes </label>
				    	<input type="text" wire:model.live="serial_bienes">
				    </div>
				    <div>
                        <label>TIPO</label>
    				    <select wire:model.live="tipo" required>
    				      <option value="">Seleccione</option>
    				      <option value="1">CPU</option>
    				      <option value="2">PERIFERICO</option>
    				      <option value="3">COMPONENTE</option>
    				    </select>
                    </div>
                    <div class="p-4 bg-gray-50 flex justify-end">
                        <button type="button" wire:click="closeModal()" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-success"> Guardar</button>
                    </div>
                </form>
            </div>
        </div>