<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;
use Hash;
class ResponsablComp extends Component
{
    public $dptos, $cedula,$full_name,$email, $responsable_id, $departamento_id;
    public $equipo_id, $marca_modelo, $serial, $serial_BN, $estado, $fecha_asig;
    public $new=false, $ver=false;
    public $responsable, $responsable2, $Dataequipo, $AsigEqui;




    function mount(){
        $this->dptos = Departamento::all();
    }

    public function render()  { return view('livewire.responsabl-comp');    }

    public function ViewNew(){  $this->new=true;    }

    public function Shear()
    {
        $responsable = Responsable::where('cedula','=',$this->cedula)->first();
        if ($responsable){
            $this->ver =true; 
            $this->full_name = $responsable->full_name;
            $this->cedula = $responsable->cedula;
            $this->email= $responsable->email;
            $this->departamento_id = $responsable->departamento_id;
            $this->responsable_id = $responsable->id;
        }else{
            $this->ver =false; 
             session()->flash('message', 'No esta registrado.');
        } 
    }
    //REGISTRAR NUEVO
    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'cedula' => 'required',
            'email'=> 'required | email',
            'departamento_id' => 'required', //UBICACION DE EQUIPO
        ]);
        responsable::Create([
            'full_name' => $this->full_name,
            'cedula' => $this->cedula,
            'email'=> $this->email,
            'departamento_id' => $this->departamento_id,
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
            'privilege' => 3,
        ]);
    }

    public function ShearEquipo(){
        //$Dataequipo = Equipo::where('serial_BN','=', $this->serial_BN)->get();
        $Dataequipo = Equipo::where('serial_BN', 'like', '%' . $this->serial_BN . '%')
             ->orWhere('serial', 'like', '%' . $this->serial_BN . '%')
             ->get();
        $this->Dataequipo = $Dataequipo;
        foreach ($Dataequipo as $key => $value) {
            $this->equipo_id= $value->id;
        }      
    }

    public function AsignarEquipo(){
        $this->validate([
            'cedula' => 'required',
            'serial_BN' => 'required',
        ]); 
        $AsigEqui =  Equipo::where('id','=', $this->equipo_id)->first();
                $AsigEqui->update([
                 'responsable_id' => $this->responsable_id,
                ]);
                $AsigEqui->save();      
        $this->resetInputFields();
        $this->close();
        session()->flash('message','Equipo Asignado');
    }

    public function close(){
        $this->new= false;
        $this->ver = false;
        $this->Dataequipo     = false;
    }
    

    public function resetInputFields()
    {
        $this->cedula='';
        $this->full_name ='';
        $this->email ='';
        $this->departamento_id= '';
        $this->responsable_id ='';
        $this->equipo_id ='';
        $this->serial_BN = '';
        $this->cedula = '';
    }
}
