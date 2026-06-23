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

class AsigServicioComp extends Component
{
    use WithPagination;
    public $responsable, $equipos, $solicits, $UserSoport, $tecnico, $ticketSeleccionado, $servicio_id, $prioridad ;

    function mount(){
        //$this->responsable =  Auth::user()->responsable['id'];
        //$this->equipos = Equipo::where('responsable_id','=',$this->responsable)->get();
        //$this->solicits = SoliServicio::where('responsable_id','=',$this->responsable)->get();
        $this->solicits = SoliServicio::all();
        $this->UserSoport = User::all();
    }
    public function render()
    {
        return view('livewire.asig-servicio-comp');
    }

    public function leerFila($id)
    {
        // Busca el registro en la base de datos
        $servicio = SoliServicio::find($id);
        $this->ticketSeleccionado = $servicio->codigo;
        $this->servicio_id = $servicio->id;
    }

    public function store(){
          $this->validate([
            'servicio_id'=>'required',
            'tecnico' => 'required',   
            'prioridad' => 'required',
        ]);
       
        Bitacora::Create([
            'soli_servicios_id'=> $this->servicio_id,
            'tecnico_id' => $this->tecnico,    //guarda el id de usuarios        
            'prioridad' => $this->prioridad,
        ]);
        //ACTUALIZAR EL ESTADO DE LA SOLICITUD
          $this->mount();
          $this->resetInputFields();
         session()->flash('message', 'Registro actualizado.');

    }
    public function resetInputFields()
    {
        $this->servicio_id = '';
        $this->ticketSeleccionado= '';
        $this->prioridad ='';
        $this->tecnico ='';
    }
}
