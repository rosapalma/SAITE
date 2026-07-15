<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use App\Models\SoliServicio;
use App\Models\Responsable;
use App\Models\Bitacora;
use App\Models\User;
use Auth;
use Illuminate\Support\Carbon;

class AsigServicioComp extends Component
{
    use WithPagination;
    public $responsable, $equipos, $UserSoport, $tecnico, $ticketSeleccionado,$servicio, $servicio_id, $prioridad, $shearch, $isOpenShow = false, $id, $editar, $tecnico_id, $tecnicoAsig, $EdoSolid=false;

    function mount(){
        $this->UserSoport = User::where('privilege','=','2')->orwhere('privilege','=','3')->get();
    }

    public function render()
    {
        if($this->shearch){
            $solicits = SoliServicio::where('statud', 'like', '%' . $this->shearch . '%')->paginate(6);
            return view('livewire.asig-servicio-comp', [
                'solicits' => $solicits
            ]);
        }else{
            $solicits = SoliServicio::paginate(6);
            return view('livewire.asig-servicio-comp', [
                'solicits' => $solicits
            ]);
        }

    }
    public function Show($id)
    {
       // $this->leerFila();
        $this->isOpenShow = true; 
        $servicio = SoliServicio::findOrFail($id);
        $this->servicio = $servicio;     
    }

    public function leerFila($id)
    {
        $this->resetInputFields();
        $this->EdoSolid=false;
        // Busca el registro en la base de datos
        $servicio = SoliServicio::find($id);
        $this->servicio= $servicio; 
        $this->ticketSeleccionado = $servicio->codigo;
        $this->servicio_id = $servicio->id;
        if($servicio->statud =='PENDIENTE'){ //ENT0NCES TIENE BITACORA
                $this->tecnico_id =   $this->tecnico;
        }
        if($servicio->statud =='ASIGNADA'){ //ENT0NCES TIENE BITACORA
                $this->tecnicoAsig =   $servicio->Bitacora->tecnico['full_name'];
                $this->tecnico_id =   $servicio->Bitacora->tecnico['id'];
                $this->prioridad =   $servicio->Bitacora['prioridad'];
        }
        if( $servicio->statud =='CERRADA') {     
            $this->EdoSolid = true; //DESABILITAR SECT TECNICO-PRIORIDAD
        }
        
    }

   

    public function store(){
        $this->validate([
            'servicio_id'=>'required',
            'tecnico' => 'required',   
            'prioridad' => 'required',
        ]);
        if($this->editar){
            $Bitacora = Bitacora::where('soli_servicios_id','=',$this->servicio_id )->first();
            $Bitacora->update([
            'soli_servicios_id'=> $this->servicio_id,
            'responsable_id' => $this->tecnico,    //guarda el id del tecino       
            'prioridad' => $this->prioridad,
            'fecha' => now(),
            ]);
            $Bitacora->save();
        }else{
             Bitacora::Create([
            'soli_servicios_id'=> $this->servicio_id,
            'responsable_id' => $this->tecnico,    //guarda el id del tecino       
            'prioridad' => $this->prioridad,
            'fecha' => now(),
            ]);
        } 
        //ACTUALIZAR EL ESTADO DE LA SOLICITUD
        $UpdateSolicitud = SoliServicio::where('id','=',$this->servicio_id )->first();
          $UpdateSolicitud->update([
            'statud' => 'ASIGNADA',
            ]);
        $UpdateSolicitud->save();
        $this->mount();
        $this->resetInputFields();
        session()->flash('message', 'Registro actualizado.');

    }
    public function closeModal() { $this->isOpen = false;  $this->resetInputFields(); $this->isOpenShow = false; }
    public function resetInputFields()
    {
        $this->servicio_id = '';
        $this->ticketSeleccionado= '';
        $this->prioridad ='';
        $this->tecnico ='';
        $this->tecnico_id ='';
        $this->editar =false;
        $this->EdoSolid = false;
        $this->tecnicoAsig = '';
    }
}
