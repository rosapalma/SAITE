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

class BitacoraComp extends Component
{
    use WithPagination;
    public $shearch, $ticketSeleccionado, $solicitud, $isOpenShow, $solicitud_id,$soli_servicios_id, $tecnico_id, $solucion, $diagnostico, $recomendacion, $prioridad, $fecha, $Bitacora, $IDBitacora, $servicio;




    public function render()
    {  
        return view('livewire.bitacora-comp', [
            'bitacors' => Bitacora::paginate(10) 
        ]);
    }

    public function leerFila($id)
    {
        // Busca el registro en la base de datos
        $solicitud = SoliServicio::find($id);
        $this->ticketSeleccionado = $solicitud->codigo;
        $this->solicitud_id = $solicitud->id;
        $this->solicitud= $solicitud;
        $this->recomendacion = $solicitud->Bitacora['recomendacion'];
        $this->diagnostico = $solicitud->Bitacora['diagnostico'];
        $this->solucion = $solicitud->Bitacora['solucion'];
        $this->fecha = $solicitud->Bitacora['fecha'];

    }

    public function Show($sol, $bit)
    {
        $this->isOpenShow = true; 
        $servicio = SoliServicio::findOrFail($sol);
        $this->servicio = $servicio;  
        $IDBitacora = Bitacora::findOrFail($bit); 
        $this->IDBitacora = $IDBitacora;          
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
    public function closeModal() { $this->isOpen = false;  $this->resetInputFields(); $this->isOpenShow = false; }
    public function resetInputFields(){
        $this->diagnostico ='';
        $this->solucion= '';
        $this->recomendacion ='';
        $this->fecha ='';
        $this->solicitud ='';
        $this->solicitud_id ='';
    }
}
