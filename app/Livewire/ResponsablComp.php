<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Personal;
use App\Models\Responsable;
use App\Models\Equipo;
use App\Models\User;

class ResponsablComp extends Component
{
    public $dptos, $cedula,$full_name,$email, $departamento_id, $personal_id;
    public $equipo_id, $marca, $serial, $serialBN, $estado;
    public $new=false, $RegPers=false, $ver=false;
    public $searchcedula, $searchpersonal, $inputcedula, $inputserialB, $searchequipo, $search;

    function mount(){
        $this->dptos = Departamento::all();
    }
    public function render()
    {
        return view('livewire.responsabl-comp');
    }
    public function ViewNew(){
        $this->new=true;
    }

    public function Shear()
    {
        $searchpersonal = Personal::where('cedula','=',$this->inputcedula)->first();
        $this->full_name = $searchpersonal->full_name;
        $this->cedula = $searchpersonal->cedula;
        $this->email= $searchpersonal->email;
        $this->departamento_id = $searchpersonal->departamento_id;
        $this->personal_id = $searchpersonal->id;
        $this->ver =true;
    }
    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'cedula' => 'required',
            'email'=> 'required | email',
            'departamento_id' => 'required',

        ]);
        Personal::Create([
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
        $personal = Personal::where('cedula','=',$this->cedula)->first();
        User::Create([
            'personal_id' => $personal->id,
            'email' =>$this->email,
            'password'=>Hash::make($this->cedula),
            'privilege' => 3,
        ]);

    }
    public function ShearEquipo(){
        $searchequipo = Equipo::where('serial_BN','=',$this->serialBN)->first();
        $this->searchequipo= $searchequipo;
        $this->equipo_id = $searchequipo->id;
        $this->marca= $searchequipo->marca;
        $this->estado = $searchequipo->estado;
        $this->verEquipo =true;
    }
    public function Guardar(){
        $this->validate([
            'cedula' => 'required',
            'serialBN' => 'required',
        ]);
       $search = Responsable::where('equipo_id','=',$this->equipo_id)->first();
         if ($search and $search->estado != 'STOP'){
            //$this->search=$search;
             session()->flash('message', 'EQUIPO YA SE ENCUENTRA ASIGNADO 0 ESTA DESINCORPORADO.');
         }else{
           Responsable::Create([
                'personal_id' => $this->personal_id,
                'equipo_id' => $this->equipo_id,
                'fecha_asig'=> Date('Y-m-d'), //asigna la fecha o la establece el operador
            ]);
            session()->flash('message', 'Datos Guardado con exito.');
            $this->resetInputFields();
            $this->closenew();            
         }
      

    }
    public function closenew(){
        $this->new= false;
        $this->ver = false;
        $this->searchequipo     = false;
    }
    


    public function ver(){
        $full_name = $this->full_name;
        $cedula = $this->cedula;
        $email= $this->email;
        $departamento_id = $this->departamento_id;
    }

    public function resetInputFields()
    {
        $this->cedula='';
        $this->full_name ='';
        $this->email ='';
        $this->departamento_id= '';
        $this->personal_id ='';
        $this->equipo_id ='';
        $this->inputserialB = '';
        $this->inputcedula = '';
    }
}
