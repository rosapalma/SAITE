<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use App\Models\Ubicacion;
use App\Models\Responsable;

class EquipoComp extends Component
{
    use WithPagination;
    #[Url] // Mantiene el filtro en la barra de direcciones
    public $searchserialbienes = '',$searchestado = '', $ubicacions;
    #[Url]
    public $equipo_id, $responsable_id, $tipo, $marca_modelo, $serial, $serial_BN, $estado, $ubicacion_id, $fecha_asig, $fecha_adq, $responsable;
    public $editar = false, $isOpen = false, $isOpenShow = false;  // Controla la visibilidad de modals


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
        // Resetea las propiedades seleccionadas y paginacion
    public function clearFilters()
    {
        $this->reset(['searchserialbienes' , 'searchserialbienes']); 
        $this->reset([ 'searchestado', 'searchestado']); 
        $this->resetPage(); 
    } 
    public function Show($id)
    {
        $this->isOpenShow = true; 
        $equipo = Equipo::findOrFail($id);
        $this->equipo_id = $id;
        $this->tipo= $equipo->tipo;
        $this->marca_modelo = $equipo->marca_modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->ubicacion_id = $equipo->ubicacion['name'];
        $this->fecha_adq = $equipo->fecha_adq;
        $this->estado = $equipo->estado;
        if ($equipo->responsable){
            $this->responsable=$equipo->responsable['full_name'];
            $this->fecha_asig = $equipo->fecha_asig;
        }
        
       
        
      
    }
    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function edit($id)
    {
        $this->editar = true;
        $equipo = Equipo::findOrFail($id);
        
        $this->equipo_id = $id;
        $this->tipo= $equipo->tipo;
        $this->marca_modelo = $equipo->marca_modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->estado = $equipo->estado;
        $this->ubicacion_id = $equipo->ubicacion_id;
        if ($equipo->responsable){
             $this->responsable=$equipo->responsable['full_name'];
        }
       
        $this->fecha_adq = $equipo->fecha_adq;
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'tipo'=>'required',
            'marca_modelo' => 'required',            
            'serial_BN' => 'required_without:serial',
            'serial' => 'required_without:serial_BN',
            'ubicacion_id' =>'required',
            'fecha_adq'=> 'required',
        ]);
        Equipo::updateOrCreate(['id' => $this->equipo_id], [
            'tipo'=> $this->tipo,
            'marca_modelo' => $this->marca_modelo,
            'serial'=> $this->serial,
            'serial_BN' => $this->serial_BN,
            'ubicacion_id' =>$this->ubicacion_id,
            'fecha_adq'=> $this->fecha_adq,
            'estado'=> $this->estado,
        ]);
        if ($this->responsable_id)
        {
            $Tochange=Equipo::where('id','=',$this->equipo_id)->first();
            $Tochange->update([
                'responsable_id'=> null,
                'estado' => 'STOP',
                ]);
                $Tochange->save();                      
        }
        if ($this->estado == 'DESIN')
        {
            $desinc=Equipo::where('id','=',$this->equipo_id)->first();
            $desinc->update([
                'responsable_id'=> null,
                ]);
                $desinc->save();                      
        }
       

        session()->flash('message', $this->equipo_id ? 'Registro actualizado.' : 'Registro creado.');
        $this->closeModal();
        $this->resetInputFields();
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
        $this->responsable_id ='';
        $this->responsable ='';
    }

}
        
