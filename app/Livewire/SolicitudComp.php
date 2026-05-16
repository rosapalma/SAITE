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
    public $resp_id, $equipo_id, $marca, $modelo, $tipo, $serial, $serial_BN, $descripcion, $asunto, $tipo_falla, $fecha,$equipos, $codigo, $ult;
    public $solicits;

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


   public function ver()
    {
        $equipo = Equipo::findOrFail($this->equipo_id);
        $this->tipo= $equipo->tipo->name; //trae la relacion
        $this->marca= $equipo->marca;
        $this->modelo= $equipo->modelo;
        $this->serial= $equipo->serial;
        $this->serial_BN=$equipo->serial_BN;
    }

       




    public function Save(){

        $this->validate([
            'equipo_id'=>'required',
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
        SoliServicio::Create([
            'responsable_id' => $this->resp_id,
            'equipo_id' =>$this->equipo_id,
            'codigo' => $this->codigo,
            'tipo_falla'=>$this->tipo_falla,
            'asunto' =>$this->asunto,
            'descripcion' =>$this->descripcion,
            'fecha' => now(),
            'statud'=>'pendiente',
        ]);
        $this->mount();
        $this->clear();
        session()->flash('message', 'Solicitud enviada.');
    }
    
      public function clear(){
        $this->equipo_id='';
        $this->codigo='';
        $this->tipo_falla='';
        $this->asunto ='';
        $this->descripcion='';
        $this->codigo='';

    }
}
