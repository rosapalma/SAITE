<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;
use App\App\Models\Tipo;
use App\Models\SoliServicio;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Carbon;
class SolicitudComp extends Component
{
    public $resp_id, $descripcion, $asunto, $tipo,$marca, $modelo, $serial, $serial_BN, $tipo_falla, $fecha,$equipos, $codigo, $ult;
    public $solicits, $opcionSeleccionada, $resultados = [], $editar=false, $EditSolicitud;

    function mount(){
        $this->ult = SoliServicio::all()->last(); // ultimo nro generado
        $this->resp_id =  Auth::user()->responsable['id'];
        $this->equipos = Equipo::where('responsable_id','=',$this->resp_id)->get();
        $this->solicits = SoliServicio::where('responsable_id','=',$this->resp_id)->get();
    }

    public function render()
    {
        return view('livewire.solicitud-comp');
    }



    // Esta función se ejecuta automáticamente cuando cambia el select
    public function updatedOpcionSeleccionada()
    {
        if (!empty($this->opcionSeleccionada)) {
            // Realiza la consulta a la base de datos
            $this->resultados = Equipo::where('id', $this->opcionSeleccionada)->get();

        } else {
            $this->resultados = [];
        }
    }

 
    public function store(){
        $this->validate([
            'opcionSeleccionada'=>'required',
            'asunto' => 'required',
            'descripcion' => 'required',
        ]);
     //GENERANDO CODIGO
        $ult = SoliServicio::all()->last(); // ultimo nro generado
        if(!empty($ult)){ //si existe almenos un registro
            $number = $ult->id+1; //incremento
        }else{
            $number = 1;
        }
        $anio = Date('y');
        $length = 4;
        $string = substr(str_repeat(0, $length).$number, - $length);
        $cod =  'REP'.'-'.$anio.'-'.$string; 
        $this->codigo = $cod;

        //VALIDA SI EQUIPO TIENE UNA SOLICITUD ABIERTA
        $solicitud = SoliServicio::where('equipo_id','=',$this->opcionSeleccionada)->latest()->first(); 
        if (!empty($solicitud) && $solicitud->statud != 'CERRADA'){
            session()->flash('error', 'Este equipo, ya tiene una solicitus de servicio en proceso.');
        }else{
            SoliServicio::Create([
            'responsable_id' => $this->resp_id,
            'equipo_id' =>$this->opcionSeleccionada,
            'codigo' => $this->codigo,
            'tipo_falla'=>$this->tipo_falla,
            'asunto' =>$this->asunto,
            'descripcion' =>$this->descripcion,
            'fecha' => now(),
            'statud'=>'PENDIENTE',
        ]);
        }
        
        $this->mount();
        $this->clear();        
    }
    public function edit($id){
        $this->editar = true; 
        $EditSolicitud = SoliServicio::findOrFail($id);
        $this->EditSolicitud=  $EditSolicitud->id;
        //refrescamdo carga de datos de equipo
        $this->opcionSeleccionada= $EditSolicitud->equipo_id;
        $this->updatedOpcionSeleccionada();
        $this->resp_id = $EditSolicitud->responsable_id;
        $this->opcionSeleccionada = $EditSolicitud->equipo_id;
        $this->tipo_falla = $EditSolicitud->tipo_falla;
        $this->asunto = $EditSolicitud->asunto;
        $this->descripcion= $EditSolicitud->descripcion;
    }
    public function update($id){
        $Solicitud= SoliServicio::findOrFail($id);
       // $Solicitud =  SoliServicio::where('id','=', $this->$EditSolicitud)->first();
        $Solicitud->update([
            'tipo_falla'=>$this->tipo_falla,
            'asunto' =>$this->asunto,
            'descripcion' =>$this->descripcion,
            ]);
        $Solicitud->save();         
        $this->mount();
        $this->clear(); 
    }
    
      public function clear(){
        $this->equipo_id='';
        $this->codigo='';
        $this->tipo_falla='';
        $this->asunto ='';
        $this->descripcion='';
        $this->codigo='';
        $this->resultados='';
        $this->opcionSeleccionada='';
    }
}
