   <!-- MODAL Editar y nuevo-->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
		<x-validation-errors class="mb-4" />
	    <form wire:submit.prevent="store">
	        <div class="p-6">
	            <h2 class="text-lg font-bold mb-4">{{ $equipo_id ? 'Editar Registro de Equipo' : 'Registrar Nuevo Equipo' }}</h2>
		    <div>
		    <div>
		    	<label>Tipo</label>
		        <select wire:model.live="tipo" >
		            <option value="">Seleccione</option>
		    	    <option value="CPU">CPU</option>
		    	    <option value="MONITOR">MONITOR</option>
		    		<option value="PERIFERICO">PERIFERICO</option>
		    		<option value="REGULADOR">REGULADOR</option>
		    		<option value="COMPONENTE">COMPONENTE</option>
		    	</select>
	        	
		    </div>
		    	<label>Marca || Modelo</label>
		    	<input type="text" wire:model.live="marca_modelo">
		    </div>     
		    <div>
				<label>Serial</label>
				<input type="text" wire:model.live="serial" wire:model.live="serial">
			</div>
			<div>
			   	<label>Serial de Bienes </label>
			   	<input type="text" wire:model.live="serial_BN">
			</div>
			<div>
			    <label>Ubicación</label>
	    	    <select wire:model.live="ubicacion_id" required>
	        	    <option value="">Seleccione</option>
	        	    @foreach ($ubicacions as $dp)
	    			    <option value="{{$dp->id}}">{{$dp->name}}</option>
	    		    @endforeach
	    		</select>
	    	</div>
	    	<div>
	    		Fecha de Adquisición:
	    		@if ($editar)
				 
					<input type="date" wire:model.live="fecha_adq" disabled>
				@else
					<input type="date" wire:model.live="fecha_adq">
				@endif

			</div> 
			<div>
	    	    <label>Estado</label>
		        <select wire:model.live="estado" >
		            <option value="">Seleccione</option>
		            <option value="STOP">STOP</option>
		    	    <option value="DESIN">DESINCORPORADO</option>
		    	    @if ($editar)
		    	    	<option value="ASIG">ASIGNADO</option>
		    	    @endif
		    	</select>
		    </div>
		    <br>
			@if ($responsable)
				<h3>  Responsable: {{$responsable}}</h3>
				Quitar<input type="checkbox" wire:model.live="responsable_id">
			@endif    
			<div class="p-4 bg-gray-50 flex justify-end">
				<button type="button" wire:click="closeModal()" class="btn btn-danger">Cancelar</button>
				<button type="submit" class="btn btn-success"> Guardar</button>
			</div>
		</form>
	</div>
</div>