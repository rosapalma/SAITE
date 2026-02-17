<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;
use App\Models\SoliServicio;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Carbon;
class SolicitudComp extends Component
{
    public $resp_id, $equipo_id, $marca_modelo, $tipo, $descripcion,$fecha,$equipos;
    public $isOpenShow;

    function mount(){
        $this->resp_id =  Auth::user()->responsable['id'];
        $this->equipos = Equipo::where('responsable_id','=',$this->resp_id)->get();
    }

    public function render()
    {
        return view('livewire.solicitud-comp');
    }
    public function Reportar($id){
        $this->isOpenShow = true; 
        $equipo = Equipo::findOrFail($id);
        $this->equipo_id = $equipo->id;
        $this->marca_modelo = $equipo->marca_modelo;
        $this->tipo = $equipo->tipo;
    }
    public function Save(){
        SoliServicio::Create([
            'responsable_id' => $this->resp_id,
            'equipo_id' =>$this->equipo_id,
            'descripcion' =>$this->descripcion,
            'fecha' => now(),
            'statud'=>'pendiente',
        ]);
        $this->closeModal();
        session()->flash('message', 'Solicitud enviada.');
    }
    
      public function closeModal(){
        $this->isOpenShow =false;
        $this->descripcion='';

    }
}
