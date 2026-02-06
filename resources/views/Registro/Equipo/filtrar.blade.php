
  Buscar por: 
     <input wire:model.live="searchserialbienes" type="text" placeholder="SERIAL BN"> 
    <select wire:model.live="searchestado">
        <option>ESTADO</option>
        <option value="ASIG">ASIGNADO</option>
        <option value="STOP">STOP</option>
        <option value="DESIN">DESINCORPORADO</option>
    </select>

    @if($searchserialbienes || $searchestado)
        <button type="button" wire:click="clearFilters" class="btn-warning">
            Limpiar
        </button>
    @endif