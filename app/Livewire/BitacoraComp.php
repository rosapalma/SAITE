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

class BitacoraComp extends Component
{
    use WithPagination;
    public $shearch, $soli_servicios_id, $tecnico_id, $solucion, $diagnostico, $recomendacion, $prioridad, $fecha;
    

    public function render()
    {        
        if($this->shearch){
            $bitacors = Bitacora::where('statud', 'like', '%' . $this->shearch . '%')->paginate(6);
            return view('livewire.bitacora-comp', [
                'bitacors' => $bitacors
            ]);
        }else{
            $bitacors = Bitacora::paginate(6);
            return view('livewire.bitacora-comp', [
                'bitacors' => $bitacors
            ]);
        }

    }
}
