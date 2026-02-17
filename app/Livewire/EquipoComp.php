<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use App\Models\Ubicacion;

class EquipoComp extends Component
{
    use WithPagination;
    #[Url] // Mantiene el filtro en la barra de direcciones
    public $searchserialbienes = '',$searchestado = '';
    #[Url]
    public $equipo_id, $marca_modelo, $ubicacion_id, $serial, $serial_BN, $estado, $ubicacions, $fecha_asig, $fecha_adq;
    public $isOpen = false, $isOpenShow = false;  // Controla la visibilidad de modals


     // Resetea la página al escribir para no quedar "atrapado" en una página vacía
    public function updatingSearch() { $this->resetPage(); }

    function mount(){
            $this->ubicacions = Ubicacion::all();
        }

    public function render()
    {
        return view('livewire.equipo-comp', [
            'equipos' => Equipo::query()
                ->when($this->searchserialbienes, function($query){
                    $query->where('serial_BN', 'like', '%'. $this->searchserialbienes)->orWhere('serial', 'like', '%'. $this->searchserialbienes);
                 })
               
                ->when($this->searchestado, function($query) {
                    $query->where('estado', $this->searchestado);
                })
                ->paginate(10)
        ]);

    }

    public function clearFilters()
    {
        $this->reset(['searchserialbienes' , 'searchserialbienes']); // Resetea las propiedades seleccionadas
        $this->reset([ 'searchestado', 'searchestado']); // Resetea las propiedades seleccionadas
        $this->resetPage(); // Opcional: vuelve a la página 1 si usas WithPagination
    } 
    public function Show($id)
    {
        $this->isOpenShow = true; 
        $equipo = Equipo::findOrFail($id);
        $this->equipo_id = $id;
        $this->marca_modelo = $equipo->marca_modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->estado = $equipo->estado;
    }
    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function store()
    {
        $this->validate([
            'marca_modelo' => 'required',
            //'serial'=> 'required',
            //'serial_BN' => 'required',
            'ubicacion_id' =>'required',
            'serial_BN' => 'required_without:serial',
            'serial' => 'required_without:serial_BN',

        ]);
        Equipo::updateOrCreate(['id' => $this->equipo_id], [
            'marca_modelo' => $this->marca_modelo,
            'serial'=> $this->serial,
            'serial_BN' => $this->serial_BN,
            'ubicacion_id' =>$this->ubicacion_id,
            'fecha_adq'=> $this->fecha_adq,
            'estado' => 'STOP',
        ]);

        session()->flash('message', $this->equipo_id ? 'Registro actualizado.' : 'Registro creado.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $this->equipo_id = $id;
        $this->marca_modelo = $equipo->marca_modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->estado = $equipo->estado;
        $this->openModal();
    }

    // public function delete($id)
    // {
    //     $buscar = Equipo::findOrFail($id);
    //     Equipo::find($id)->delete();
    //     session()->flash('message', 'Registro eliminado.');
    // }

    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->isOpen = false;$this->isOpenShow = false; }

    public function resetInputFields()
    {
        $this->marca_modelo='';
        $this->serial ='';
        $this->serial_bienes= '';
        $this->estado ='';
        $this->ubicacion_id = '';
    }

}
        
