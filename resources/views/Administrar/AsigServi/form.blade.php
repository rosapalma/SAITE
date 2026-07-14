<x-validation-errors class="mb-4" />
<div class="saite-card">
   <h1 class="text-dark text-center">ASIGNACIÓN DE SOLICITUD DE SERVICIO</h1>
   <form wire:submit.prevent="store">
      <h1 class="text-primary">TICKET: <b class="p-2 ">{{$ticketSeleccionado}} </b></h1>
      <br>
     @if($tecnicoAsig)
         <label class="text-primary">Asignado a:&nbsp;&nbsp;{{$tecnicoAsig}}</label>
      @endif
         <select wire:model.live="tecnico" class="form-control "@if($EdoSolid) disabled @endif>
            @if($tecnicoAsig) 
               <option>CAMBIAR TÉCNICO:</option>
            @else
               <option>TÉCNICO:</option>
            @endif
            @foreach ($UserSoport as $US)            
                  @if ($tecnico_id != $US->responsable['id'])  
                  <option value="{{$US->responsable_id}}">{{$US->responsable['full_name']}}</option>
                  @endif
            @endforeach
         </select>

      <br><br>
      <select wire:model.live="prioridad" class="form-control" @if ($EdoSolid) disabled @endif>
         <option selected>PRIORIDAD</option>
         <option value="ALTA">ALTA</option>
         <option value="NORMAL">NORMAL</option>
      </select>
      <br>

         <div>
           <x-button> GURDAR</x-button>
         </div>
   </form>
</div>
