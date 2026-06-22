detalles del equipo servicio seleccionado

ASIGNAR SERVICIO A:
     <select wire:model.live="tecnico" class="form-control">
      @foreach ($UserSoport as $US)
         @if($US->privilege == 3)
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