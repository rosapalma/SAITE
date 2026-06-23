<x-validation-errors class="mb-4" />
<form wire:submit.prevent="store">
   TICKET: <b>{{$ticketSeleccionado}}</b>
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

         <div class="p-4 bg-gray-50 flex justify-end">
                   <x-button> GURDAR</x-button>
               </div>
   </form>