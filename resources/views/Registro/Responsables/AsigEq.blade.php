<x-validation-errors class="mb-4" />
<h2 class="text-lg">Asignar Equipo</h2>
<input wire:model.live="serial_BN" type="text"  placeholder="Serial" wire:change="ShearEquipo">

@if($Dataequipo)
	@foreach ($Dataequipo as $eq)
		<div>Detalles: <br>
		   <label>Marca|Modelo: {{$eq['marca_modelo']}}</label>

		</div>

		   <label>Ubicación: {{$eq['ubicacion_id']}}</label>
		</div>      
		<div>
			indique la fecha: 
			<input type="date" wire:model.live="fecha_asig">
		</div>    
	         <button type="submit" class="btn btn-success" wire:click="AsignarEquipo"> Asignar</button>
	@endforeach

@endif
