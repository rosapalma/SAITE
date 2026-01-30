<h2 class="text-lg">Asignar Equipo</h2>
<input wire:model.live="inputserialB" type="text"  placeholder="Serial de Bienes" wire:change="ShearEquipo">

@if($searchequipo)
	<div>
	   	<label>Marca: {{$marca}}</label>
	</div>
	<div>
		<label>Modelo: {{$modelo}}</label>
	</div>
	<div>
	    <label>Tipo de Equipo: 
	        @if ($tipo==1)
	        	<label>CPU</label>
	        @elseif($tipo == 2)
	        	<label>PERIFERICO</label>
	        @elseif($tipo == 3)
	        	<label>COMPONENTE</label>
	        @endif
		</label>
	</div>
@endif

   <button type="button" wire:click="Guardar" class="btn-success">
        Guardar
   </button>


