<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;
use Auth;
use Session;
use Hash;

class SolicitudComp extends Component
{
    public $resp_id;

    function mount(){
        $this->resp_id =  Auth::user()->responsable['id'];  
    }

    public function render()
    {
        return view('livewire.solicitud-comp');
    }
    public function Equipos(){

    }
    
}
