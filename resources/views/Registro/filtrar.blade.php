  Buscar por: <input wire:model.live="search" type="text" placeholder="Marca / Modelo">

    <select wire:model.live="searchtipo">
        <option>Tipo</option>
        <option value="1">CPU</option>
        <option value="2">PERIFERICO</option>
        <option value="3">COMPONENTE</option>
    </select>
    @if($search || $searchtipo)
        <button type="button" wire:click="clearFilters" class="btn-warning">
            Limpiar
        </button>
    @endif