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
    public $shearch, $ticketSeleccionado, $solicitud, $solicitud_id,$soli_servicios_id, $tecnico_id, $solucion, $diagnostico, $recomendacion, $prioridad, $fecha, $Bitacora;
    

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

    public function leerFila($id)
    {
        // Busca el registro en la base de datos
        $solicitud = SoliServicio::find($id);
        $this->ticketSeleccionado = $solicitud->codigo;
        $this->solicitud_id = $solicitud->id;
        $this->solicitud= $solicitud;
    }

    public function store(){
        $Bitacora =  Bitacora::where('soli_servicios_id','=', $this->solicitud_id)->first();
        $Bitacora->update([
            'diagnostico' => $this->diagnostico,
            'solucion' => $this->solucion,
            'recomendacion' => $this->recomendacion,
            'fecha' => $this->fecha,
            ]);
        $Bitacora->save();
        $SoliciUpdate =  SoliServicio::where('id','=', $this->solicitud_id)->first();
        $SoliciUpdate->update([
            'statud' => 'CERRADA',          
            ]);
        $SoliciUpdate->save();

        $this->resetInputFields();
        session()->flash('message', 'Registro actualizado.');
    }

    public function resetInputFields(){
        $this->diagnostico ='';
        $this->solucion= '';
        $this->recomendacion ='';
        $this->fecha ='';
        $this->solicitud ='';
        $this->solicitud_id ='';
    }
}
