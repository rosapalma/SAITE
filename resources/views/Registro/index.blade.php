<div>
	<br><br><button type="button" wire:click="create()" aling="center" class="btn btn-primary">
    	 Nuevo 
    </button><br>
	@include ('Registro.filtrar') <!-- BUSCAR  vista filtrar-->
    
	
	@if (session('mensaje')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('mensaje') }}   
        </h1>
    @endif

	@include('Registro.tool') <!-- ACA SE MUESTRA LA TABLA vista tool-->

	   <!-- MODAL -->
        @if($isOpen)
            @include ('Registro.modal') <!-- modal, para registra nuevo o editar -->
        @endif
	
</div>