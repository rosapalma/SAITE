<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ubicacion;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;
use Hash;
class ResponsablComp extends Component
{
    public  $ubicacion_id, $cedula,$full_name,$email, $responsable_id ;
    public $equipo_id, $marca_modelo, $serial, $serial_BN, $estado, $fecha_asig, $yaResp;
    public $new=false, $ver=false;
    public $responsable, $Dataequipo, $AsigEqui, $ubicacions; 


    function mount(){
        $this->ubicacions = Ubicacion::all();
    }

    public function render()  { 
        return view('livewire.responsabl-comp');
    }




    public function Shear()
    {
        $responsable = Responsable::where('cedula','=',$this->cedula)->first();
        if ($responsable){
            $this->ver =true; 
            $this->full_name = $responsable->full_name;
            $this->cedula = $responsable->cedula;
            $this->email= $responsable->email;
            $this->ubicacion_id = $responsable->ubicacion_id;
            $this->responsable_id = $responsable->id;
        }else{
            $this->resetInputFields();
            $this->ver =false;
             session()->flash('Alertmessage', 'No esta registrado.');
        } 
    }
    //REGISTRAR NUEVO
    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'cedula' => 'required',
            'email'=> 'required | email',
            'ubicacion_id'=> 'required',

        ]);
        responsable::Create([
            'full_name' => $this->full_name,
            'cedula' => $this->cedula,
            'email'=> $this->email,
            'ubicacion_id'=> $this->ubicacion_id,
        ]);
        $this->CreateUser();
        session()->flash('message', 'Datos Guardado con exito.');
        $this->ver = true;
        $this->new= false;
    }

    public function CreateUser(){
        $responsable = Responsable::where('cedula','=',$this->cedula)->first();
        User::Create([
            'responsable_id' => $responsable->id,
            'email' =>$this->email,
            'password'=>Hash::make($this->cedula),
            'privilege' => 4,
        ]);
    }

    public function ShearEquipo(){
        $Dataequipo = Equipo::where('serial_BN', 'like', '%' . $this->serial_BN . '%')
             ->orWhere('serial', 'like', '%' . $this->serial_BN . '%')
             ->get();
        $this->Dataequipo = $Dataequipo;
        foreach ($Dataequipo as $key => $value) {
            $this->equipo_id= $value->id;
            if($value->responsable_id){
                $this->yaResp='ya tiene responsable' ;
                $this->serial_BN ='';
                $this->Dataequipo ='';
            }
            
        }    
       
    }

    public function AsignarEquipo(){
        $this->validate([
            'cedula' => 'required',
            'serial_BN' => 'required',
            'fecha_asig' =>'required',
            'ubicacion_id' =>'required',

        ]); 
        $AsigEqui =  Equipo::where('id','=', $this->equipo_id)->first();
        $AsigEqui->update([
            'responsable_id' => $this->responsable_id,
            'fecha_asig' => $this->fecha_asig,
            'estado' => 'ASIG',
            'ubicacion_id' =>$this->ubicacion_id,
            ]);
            $AsigEqui->save();
//QUIERO ACTUALIZAR EL CAMPO UBICACION_ID DE LA DB RESPONSABLES
        $this->UpdateResp()     ;
        $this->resetInputFields();
        $this->close();
        session()->flash('message','Equipo Asignado');
    }
    public function UpdateResp(){
        $UpdateResp =  Responsable::where('id','=', $this->responsable_id)->first();
        $this->UpdateResp = 'ub = '.$this->ubicacion_id;
        $UpdateResp->update([
             'ubicacion_id' =>$this->ubicacion_id,
            ]);
            $UpdateResp->save(); 

    }












    public function ViewNew(){
        $this->new= true;
    }

    public function close(){
        $this->new= false;
        $this->ver = false;
        $this->Dataequipo     = false;
    }

    public function closenew(){
        $this->new= false;
        $this->ver = false;
        $this->Dataequipo     = false;
        $this->resetInputFields();

    }
    

    public function resetInputFields()
    {
        $this->cedula='';
        $this->full_name ='';
        $this->email ='';
        $this->responsable_id ='';
        $this->ubicacion_id= '';
        $this->responsable ='';
        $this->equipo_id ='';
        $this->serial_BN = '';
    }
}
