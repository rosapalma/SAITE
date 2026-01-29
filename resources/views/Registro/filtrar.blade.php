<<<<<<< HEAD
  Buscar por: <input wire:model.live="search" type="text" placeholder="Marca / Modelo">
=======
  Buscar por: <input wire:model.live="searchmarca" type="text" placeholder="Marca"> <input wire:model.live="searchmodelo" type="text" placeholder="Modelo">
>>>>>>> Grup

    <select wire:model.live="searchtipo">
        <option>Tipo</option>
        <option value="1">CPU</option>
        <option value="2">PERIFERICO</option>
        <option value="3">COMPONENTE</option>
    </select>
<<<<<<< HEAD
    @if($search || $searchtipo)
=======
    @if($searchmarca || $searchmodelo || $searchtipo)
>>>>>>> Grup
        <button type="button" wire:click="clearFilters" class="btn-warning">
            Limpiar
        </button>
    @endif