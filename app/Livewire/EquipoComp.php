<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;

class EquipoComp extends Component
{
    use WithPagination;
    #[Url] // Mantiene el filtro en la barra de direcciones
    public $searchmarca = '',$searchmodelo = '', $searchserialbienes = '',$searchtipo = '';
    #[Url]
    public $equipo_id, $modelo, $marca, $serial, $serial_bienes, $tipo;
    public $isOpen = false;  // Controla la visibilidad del modal

     // Resetea la página al escribir para no quedar "atrapado" en una página vacía
    public function updatingSearch() { $this->resetPage(); }


    public function render()
    {
        return view('livewire.equipo-comp', [
            'equipos' => Equipo::query()
                ->when($this->searchmarca, function($query) {
                    $query->where('marca', 'like', '%' . $this->searchmarca . '%');
                })
                 ->when($this->searchmodelo, function($query) {
                    $query->where('modelo', 'like', '%' . $this->searchmodelo . '%');
                })
                 ->when($this->searchserialbienes, function($query){
                    $query->where('serial_bienes', 'like', '%'. $this->searchserialbienes);
                 })
                ->when($this->searchtipo, function($query) {
                    $query->where('tipo', $this->searchtipo);
                })
                ->paginate(10)
        ]);
    }

    public function clearFilters()
    {
        $this->reset(['searchmarca','searchmodelo', 'searchserialbienes' , 'searchtipo']); // Resetea las propiedades seleccionadas
        $this->reset(['searchmarca','searchmodelo' , 'searchserialbienes', 'searchtipo']); // Resetea las propiedades seleccionadas
        $this->resetPage(); // Opcional: vuelve a la página 1 si usas WithPagination
    } 
    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function store()
    {
        $this->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'serial'=> 'required',
            'serial_bienes' => 'required',
            'tipo' => 'required',

        ]);
        Equipo::updateOrCreate(['id' => $this->equipo_id], [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'serial'=> $this->serial,
            'serial_bienes' => $this->serial_bienes,
            'tipo' => $this->tipo
        ]);

        session()->flash('message', $this->equipo_id ? 'Registro actualizado.' : 'Registro creado.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $this->equipo_id = $id;
        $this->marca = $equipo->marca;
        $this->modelo = $equipo->modelo;
        $this->serial = $equipo->serial;
        $this->serial_bienes = $equipo->serial_bienes;
        $this->tipo = $equipo->tipo;
        $this->openModal();
    }

    public function delete($id)
    {
        $buscarrelacion = Equipo::findOrFail($id);
        echo $buscarrelacion;
        Equipo::find($id)->delete();
        session()->flash('message', 'Registro eliminado.');
    }

    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->isOpen = false; }

    public function resetInputFields()
    {
        $this->marca='';
        $this->modelo ='';
        $this->serial ='';
        $this->serial_bienes= '';
        $this->tipo ='';
    }

}
        
