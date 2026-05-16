<div>
	<!-- <button type="button" wire:click="create()" aling="center" class="btn btn-primary">
    	 Nuevo 
    </button><br> -->
      <div style="">
         <button  wire:click="create()" class="btn btn-success">NUEVO</h1></button>
      </div>
      <div style="display:flex; justify-content: flex-end">
      <div>
         @include ('Registro.Equipo.filtrar') <!-- BUSCAR  vista filtrar--> 
         @if($searchserialbienes || $searchestado)
           <button type="button" wire:click="clearFilters" class="btn btn-warning">
               Limpiar
           </button>
         @endif
      </div>      
      </div>

    
	
	@if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
        </h1>
    @endif

	@include('Registro.Equipo.tool') <!-- ACA SE MUESTRA LA TABLA vista tool-->

	   <!-- MODAL -->
        @if($isOpen)
            @include ('Registro.Equipo.modal') <!-- modal, para registra nuevo o editar -->
        @endif

         @if($isOpenShow)
            @include ('Registro.Equipo.show') <!-- modal, para registra nuevo o editar -->
        @endif
	<br><br><br><br>
</div>