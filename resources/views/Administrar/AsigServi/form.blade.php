<x-validation-errors class="mb-4" />
<h1 class="text-dark text-center">ASIGNACIÓN DE SOLICITUD DE SERVICIO</h1>
<form wire:submit.prevent="store">
   <h1 class="text-primary">TICKET: <b class="p-2">{{$ticketSeleccionado}}<b></h1>
   <br>
   <select wire:model.live="tecnico" class="form-control">
      <option>ASIGNAR SERVICIO A:</option>
      @foreach ($UserSoport as $US)
         @if($US->privilege < 3 )
            <option value="{{$US->id}}">{{$US->responsable['full_name']}}</option>
         @endif
      @endforeach
   </select>
   
   <br><br>
   <select wire:model.live="prioridad" class="form-control">
      <option selected>PRIORIDAD</option>
      <option>ALTA</option>
      <option>NORMAL</option>
   </select>
   <br>
   <div class="">
     <x-button> GURDAR</x-button>
   </div>
</form>