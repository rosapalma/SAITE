
  Buscar por: 
    <input wire:model.live="searchmarca" type="text" placeholder="Marca">
    <input wire:model.live="searchmodelo" type="text" placeholder="Modelo"> 
     <input wire:model.live="searchserialbienes" type="text" placeholder="N# Bienes"> 
    <select wire:model.live="searchtipo">
        <option>Tipo</option>
        <option value="1">CPU</option>
        <option value="2">PERIFERICO</option>
        <option value="3">COMPONENTE</option>
    </select>

    @if($searchmarca || $searchmodelo || $searchserialbienes || $searchtipo)
        <button type="button" wire:click="clearFilters" class="btn-warning">
            Limpiar
        </button>
    @endif