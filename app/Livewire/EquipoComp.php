<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use App\Models\Ubicacion;
use App\Models\Responsable;
use App\Models\Tipo;


class EquipoComp extends Component
{
    use WithPagination;
    #[Url] // Mantiene el filtro en la barra de direcciones
    public $searchserialbienes = '',$searchestado = '', $tipos, $ubicacions;
    #[Url]
    public $equipo_id, $equipo, $responsable_id, $cedula,$full_name, $tipo, $marca, $modelo, $serial, $serial_BN, $estado, $ubicacion_id, $fecha_asig, $fecha_adq, $responsable, $DeleResp;
    public $editar = false, $isOpen = false, $isOpenShow = false;  // Controla la visibilidad de modals


     // Resetea la página al escribir para no quedar "atrapado" en una página vacía
    public function updatingSearch() { $this->resetPage(); }

    function mount(){
            $this->ubicacions = Ubicacion::all();
            $this->tipos = Tipo::all();
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
                ->paginate(3)
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
        $this->tipo= $equipo->tipo->id;
        $this->marca = $equipo->marca;
        $this->modelo = $equipo->modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->ubicacion_id = $equipo->ubicacion['name'];
        $this->fecha_adq = $equipo->fecha_adq;
        $this->estado = $equipo->estado;
        $this->tipo = $equipo->tipo;
        if ($equipo->responsable){
            $this->responsable=$equipo->responsable['full_name'];
            $this->fecha_asig = $equipo->fecha_asig;
        }
        
    

        
      
    } 
    public function Shear()
    {
        $responsable = Responsable::where('cedula','=',$this->cedula)->first();
        if ($responsable){
            $this->ver =true; 
            $this->full_name = $responsable->full_name;
            $this->cedula = $responsable->cedula;
            $this->responsable_id = $responsable->id;
        }else{
            $this->responsable_id = '';
            session()->flash('Alertmessage', 'No esta registrado.');
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
        $this->tipo= $equipo->tipo_id;
        $this->marca = $equipo->marca;
        $this->modelo = $equipo->modelo;
        $this->serial = $equipo->serial;
        $this->serial_BN = $equipo->serial_BN;
        $this->fecha_adq = $equipo->fecha_adq;
        $this->estado = $equipo->estado;
        $this->ubicacion_id = $equipo->ubicacion_id;
        $responsable = Responsable::where('id','=',$equipo->responsable_id)->first();
        if ($responsable){
            $this->responsable = $responsable;
            $this->cedula=$responsable->cedula;
            $this->full_name=$responsable['full_name'];
            $this->fecha_asig = $equipo->fecha_asig;
        }
        
        $this->openModal();
    }
 
    public function store()
    {
        $this->validate([
            'tipo'=>'required',           
            'serial_BN' => 'required_without:serial',
            'serial' => 'required_without:serial_BN',
            'ubicacion_id' =>'required',
            'fecha_adq'=> 'required',
        ]);
        if ($this->cedula) { 
         $this->validate([
            'cedula' => 'exists:responsables,cedula',
        ]);          
            $responsable = Responsable::where('cedula','=',$this->cedula)->first();
            $this->responsable_id = $responsable->id; 
            $this->validate([                
                'fecha_asig'=>'required',           
            ]);
        }else{
            $this->responsable_id = null;
            $this->fecha_asig = null;
        }  
        if ($this->estado == 'DESI'){
            $this->responsable_id = null;
            $this->fecha_asig = null;
        } 
        if ($this->DeleResp){           
            $this->responsable_id = null;
            $this->fecha_asig = null;                     
        }           
        Equipo::updateOrCreate(['id' => $this->equipo_id], [
            'tipo_id'=> $this->tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'serial'=> $this->serial,
            'serial_BN' => $this->serial_BN,
            'ubicacion_id' =>$this->ubicacion_id,
            'fecha_adq'=> $this->fecha_adq,
            'estado'=> $this->estado,
            'responsable_id' => $this->responsable_id,
            'fecha_asig' => $this->fecha_asig,
        ]);

       

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
    public function closeModal() { $this->isOpen = false;  $this->resetInputFields(); $this->isOpenShow = false; }

    public function resetInputFields()
    {
        $this->tipo = '';
        $this->marca= '';
        $this->modelo ='';
        $this->serial ='';
        $this->serial_bienes= '';
        $this->estado ='';
        $this->ubicacion_id = '';
        $this->responsable_id ='';
        $this->responsable ='';
        $this->cedula ='';
        $this->full_name ='';
        $this->fecha_asig ='';
        $this->editar ='';
    }

}
        
