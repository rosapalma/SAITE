  <ul>
         @foreach ($solicits as $sol)
            @if($sol->statud == 'pendiente')
            <li class="text-danger">
               <input type="checkbox" wire:model.live="asignar">&nbsp;&nbsp;{{$sol->equipo['marca']}}, {{$sol->equipo['modelo']}}--  {{$sol->responsable['full_name']}} del{{$sol->fecha}}
            </li>
            @endif
            @if($sol->statud == 'en proceso')
               <li class="text-greed">
                  <input type="checkbox" wire:model.live="asignar">&nbsp;&nbsp;{{$sol->equipo['marca']}}, {{$sol->equipo['modelo']}}--  {{$sol->responsable['full_name']}}  del {{$sol->fecha}}
               </li>
            @endif
            @if($sol->statud == 'culminada')
               <li class="text-primary">
                  <input type="checkbox" wire:model.live="asignar">&nbsp;&nbsp;{{$sol->equipo['marca']}}, {{$sol->equipo['modelo']}}--  {{$sol->responsable['full_name']}} del {{$sol->fecha}}
               </li>
            @endif
         @endforeach
      </ul>