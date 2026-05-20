   <!-- MODAL Editar y nuevo-->
      
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
    	<img src="{{asset('images/ICONS/close.png')}}" wire:click="closeModal()" width="30" style=" float: right;cursor: pointer;" >
		<x-validation-errors class="mb-4" />
	    <form wire:submit.prevent="store">
	        <div class="p-6">
	            <h2 class="text-lg font-bold mb-4 title">{{ $equipo_id ? 'EDITAR REGISTRO DE EQUIPO' : 'REGISTRO DE EQUIPO' }}</h2>
		    <div>
		    <div>
		    	<label class="label-blue form-label m-0">TIPO DE EQUIPO</label>
		        <select wire:model.live="tipo" class="form-control">
			        <option>Seleccione</option>
			        <!--	mostrar el tipo de equipo si es editar-->
			        @foreach ($tipos as $tipo)
			        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
			        @endforeach
		   		</select>	        	
		    </div>
		  <!--   <div>
		    	<label>MARCA || Modelo</label>
		    	<input type="text" wire:model.live="marca_modelo">
		    </div>  -->
			<div style="display: flex;">
			     <div>
			    	<input type="text" wire:model.live="marca" placeholder="MARCA" class="form-control">
			    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			     <div>
			    	<input type="text" wire:model.live="modelo" placeholder="MODELO" class="form-control">
			    </div>
			</div>
		   	<div style="display: flex;" >   
			    <div>
					<input type="text" wire:model.live="serial" placeholder="SERIAL" class="form-control">
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div>
				   	<input type="text" wire:model.live="serial_BN" placeholder="SERIAL BN" class="form-control">
				</div>
			</div><br>
			<div>
		    	<label class="label-blue">Fecha de Adquisición:</label>
		    	@if ($editar)				 
					<input type="date" wire:model.live="fecha_adq" disabled class="form-control">
				@else
					<input type="date" wire:model.live="fecha_adq" class="form-control">
				@endif

			</div><br>

			<div>
			    <label class="label-blue form-label m-0">UBICACIÓN</label>
		        <select wire:model.live="ubicacion_id" required class="form-control">
		       	    <option value="">Seleccione</option>
		       	    @foreach ($ubicacions as $dp)
		    		    <option value="{{$dp->id}}">{{$dp->name}}</option>
		    	    @endforeach
		    	</select>
		    </div><br>
		    LISTA ACA LOS USUARIOS YA REG. PARA ASIG RESPONSABLESS
		    <div>
		        <label class="label-blue form-label m-0">ESTADO</label>
			    <select wire:model.live="estado" class="form-control">
			        <option value="">Seleccione</option>
			        <option value="MANT">EN MANTENIMIENTO</option>
			  	    <option value="DESINC">DESINCORPORADO</option>
			  	    <option value="OPR">OPERATIVO</option>
			   	</select>
			</div>
			<br>
			@if ($responsable)
				<label class="label-blue">  RESPONSABLE: </label>&nbsp;&nbsp;<label>{{$responsable}} </label><!--EQUIPO TIENE RESPONSABLE/ESTA ASIGNADO-->
				&nbsp;&nbsp;Quitar&nbsp;<input type="checkbox" wire:model.live="responsable_id">
			@endif    
			 <div class="p-4 bg-gray-50 flex justify-end">
                <x-button> GURDAR</x-button>
            </div>
		</form>
	</div>
</div>