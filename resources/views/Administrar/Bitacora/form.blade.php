
<x-validation-errors class="mb-4" />
<h1 class="text-dark text-center">BITACORA DE TRABAJO TÉCNICO</h1>
    
   
   <div class="border border-dark"> 
	   	<div> USUARIO: <?php echo strtoupper (Auth::user()->responsable['full_name']);?> | 
	          UBICACIÓN: UNIDAD DE INFORMÁTICA
	    </div>
		@if ($solicitud)
	    <div>EQUIPO:  {{$solicitud->equipo->tipo['name']}}&nbsp;&nbsp;{{$solicitud->equipo['modelo']}}  | 
	    	FECHA DE SOLICITUD: {{$solicitud->fecha}} </div>
	    @endif
   </div>
  
        
       
<form wire:submit.prevent="store">

   <h1 class="text-primary">TICKET: <b class="p-2">{{$ticketSeleccionado}}<b></h1>
   <div>
   	DIAGNOSTICO
   		<input type="text" wire:model.live="diagnostico">
   </div>
   <div>
   	SOLUCIÓN
   		<input type="text" wire:model.live="solucion">
   </div>
   <div>
   	RECOMENDACIÓN
   		<textarea id="comentarios" wire:model.live="recomendacion" rows="3" cols="40" placeholder="Escribe aquí..."></textarea>
   </div>
   <div>
   	FECHA
   	<input type="date" wire:model.lave="fecha">
   </div>
   
   


   <br>
   <div class="">
     <x-button> GURDAR</x-button>
   </div>
</form>