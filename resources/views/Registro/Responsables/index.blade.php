<div class="p-6">
    <h2 class="text-lg font-bold mb-4">Registrar || Asignar Responsables</h2>
</div>
<button type="button" wire:click="ViewNew()" aling="center" class="btn btn-primary">Nuevo</button><br><br>
@if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
        </h1>
    @endif
@if($new)
	@include ('Registro.Responsables.new')
@endif
@if($ver) <!--si el responsable fue registrado en db personal -->
	@include ('Registro.Responsables.ver')
@endif

	Buscar Responsable<input wire:model.live="inputcedula" type="text"  autofocus placeholder="Cédula" wire:change="Shear">

 
 
<br><br>
<div>
	@include ('Registro.Responsables.AsigEq')
</div>


