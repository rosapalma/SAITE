<x-validation-errors class="mb-4" />
<h2 class="text-lg">Asignar Equipo</h2>
<input wire:model.live="serialBN" type="text"  placeholder="Serial BN" wire:change="ShearEquipo">

@if($searchequipo)
	<div>
	   <label>Marca: {{$marca}}</label>
	</div>
	<div>
	   <label>Estado del Equipo: {{$estado}}	</label>
	</div>
@endif
<br><br><br>
   <button type="button" wire:click="Guardar()" class="btn-success">
        Guardar
   </button>
   {{$search}}


