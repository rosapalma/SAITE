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
			        	@if ($tipo)
			       			 <option value="{{$tipo->id}}" selected>{{$tipo->name}}</option>
				        @else
				        	<option value="{{$tipo->id}}">{{$tipo->name}}</option>
				        @endif
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
		    </div>
		    <div>
		        <label class="label-blue form-label m-0">ESTADO</label>
			    <select wire:model.live="estado" class="form-control">
			        <option value="">Seleccione</option>
			        <option value="MANT">EN MANTENIMIENTO</option>
			  	    <option value="DESI">DESINCORPORADO</option>
			  	    <option value="OPER">OPERATIVO</option>
			   	</select>
			</div><br>
			<h1>responsable id : {{$responsable_id}}</h1>
			<div class="border-top">
		    	<label class="label-blue form-label m-0">RESPONSABLE</label>    	
		    		<input wire:model.live="cedula" type="text"  autofocus placeholder="CÉDULA" wire:change="Shear" @if ($responsable) disabled @endif >
		    		@if ($responsable) 
						<label>Quitar&nbsp;
							<input type="checkbox" wire:model.live="DeleResp" >
						</label>	

					@endif			
				<label class="label-blue form-label m-2">{{$full_name}}</label> 
		    		<br>
				<label>	fecha de Asignación: 
					<input type="date" wire:model.live="fecha_asig" @if ($responsable) disabled @endif>
				</label>		
		    <div> 
			  
			<div class="p-4 bg-gray-50 flex justify-end">
                <x-button> GURDAR</x-button>
            </div>
		</form>
	</div>
</div>