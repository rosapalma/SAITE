
<div align="center" class="" style="margin-top: 5%;">
	
	@if (session('mensaje'))
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('mensaje') }}    </h1>
    @endif
 <x-validation-errors class="mb-4" />
    <div>
    	<label>Marca</label>
    	<input type="text" wire:model.live="marca">
    </div>
    <div>
    	<label>Modelo</label>
    	<input type="text" wire:model.live="modelo">
    </div>
    <div>
    	<label>Nro de Bienes </label>
    	<input type="text" wire:model.live="bienes">
    </div>


    <div align="center"> 
        <x-button wire:click="save()">
            {{ __('GUARDAR') }}
        </x-button>
    </div><br><br>
    {{$equipos}}


</div>

