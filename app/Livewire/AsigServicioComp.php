<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use App\Models\SoliServicio;
use App\Models\Responsable;
use App\Models\User;

use Auth;

class AsigServicioComp extends Component
{
    use WithPagination;
    public $responsable, $equipos, $solicits, $UserSoport, $tecnico;

    function mount(){
        //$this->responsable =  Auth::user()->responsable['id'];
        //$this->equipos = Equipo::where('responsable_id','=',$this->responsable)->get();
        //$this->solicits = SoliServicio::where('responsable_id','=',$this->responsable)->get();
        $this->solicits = SoliServicio::all();
        $this->UserSoport= User::all();
    }
    public function render()
    {
        return view('livewire.asig-servicio-comp');
    }
}
