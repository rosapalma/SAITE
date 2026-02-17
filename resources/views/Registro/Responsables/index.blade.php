<div class="container-fluid">

	<button type="button" wire:click="ViewNew()" aling="center" class="btn btn-primary">Registrar Nuevo Responsable</button><br><br> 
	<!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
		@if (session('message'))
		 <h3 align="center" class=" bg-success"> 
		      {{ session('message') }}   
	     </h3>
	     @endif
	     @if (session('Alertmessage'))
		 <h3 align="center" class=" bg-warning"> 
		      {{ session('Alertmessage') }}   
	     </h3>
	     
	    @endif
	    
	@if($new)<!--MODAL-->
		@include ('Registro.Responsables.new')
	@endif
	

		Buscar Responsable<input wire:model.live="cedula" type="text"  autofocus placeholder="CÉDULA" wire:change="Shear">

	 @if($ver)
		@include ('Registro.Responsables.ver')
	@endif
	 
	<br><br>
	<div>
		@include ('Registro.Responsables.AsigEq')
	</div>
</div>


