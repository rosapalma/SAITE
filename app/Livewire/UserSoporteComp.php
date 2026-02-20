<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Ubicacion;
use App\Models\Responsable;
use Hash;
use Auth;

class UserSoporteComp extends Component
{
     use WithPagination;

    public $user_id, $full_name, $cedula, $cargo, $ubicacion_id, $email, $password_confirmation, $password,$usuarios, $privilege, $ubicacions, $isOpenShow=false, $isOpen=false, $editar=false;
   

    function mount(){
        $this->usuarios = User::orderBy('id', 'desc')->get();
        $this->ubicacions = Ubicacion::all();
    }
    public function render()
    {
        return view('livewire.user-soporte-comp');
    }
    















    public function Show ($id){
        $this->isOpenShow = true; 
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->cedula = $user->responsable['cedula'];
        $this->full_name = $user->responsable['full_name'];
        $this->email = $user->email;
        $this->cargo = $user->responsable['cargo'];
        $this->ubicacion_id = $user->responsable['ubicacion_id'];
        $this->privilege = $user->privilege;
           
    }



    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }
    public function SaveResp(){
        $this->validate([
            'cedula'=>'required',
            'full_name' => 'required',            
            'email' => 'required',
            'cargo' => 'required',
            'ubicacion_id' =>'required',
        ]);
          Responsable::Create([
            'cedula'=> $this->cedula,
            'full_name' => $this->full_name,            
            'email' => $this->email,
            'cargo'=> $this->cargo,
            'ubicacion_id' =>$this->ubicacion_id,
        ]);














    }
    public  function store(){
         $this->validate([
            'privilege'=> 'required',
            'password'=>'required',
            'password_confirmation'=>'required',
        ]);
        $this->SaveResp();
        $responsable = Responsable::where('cedula','=',$this->cedula)->first();
         User::updateOrCreate(['id' => $this->user_id], [
            'responsable_id' => $responsable->id,
            'cedula'=> $this->cedula,
            'full_name' => $this->full_name,            
            'email' => $this->email,
            'cargo'=> $this->cargo,
            'ubicacion_id' =>$this->ubicacion_id,
            'email' => $this->email,
            'password' =>Hash::make($this->password),
            'privilege'=> $this->privilege,
        ]);    

        session()->flash('message', $this->user_id, $this->responsable_id  ? 'Registro actualizado.' : 'Registro creado.');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        //$this->editar = true;
        //$resp = Responsable::findOrFail($id2); 
        $user = user::findOrFail($id);       
        $this->user_id = $id;
        $this->cedula = $user->responsable['cedula'];
        $this->full_name = $user->responsable['full_name'];
        $this->email = $user->email;
        $this->cargo = $user->responsable['cargo'];
        $this->ubicacion_id = $user->responsable['ubicacion_id'];
        $this->privilege = $user->privilege;
        

        $this->openModal();
    }

    public function openModal() { $this->isOpen = true; }
    public function closeModal() { $this->isOpen = false;
        $this->isOpenShow = false; }

    public function resetInputFields()
    {
         $this->cedula='';
         $this->full_name ='';
         $this->email= '';
         $this->ubicacion_id ='';
         $this->cargo = '';
         $this->password ='';
         $this->responsable ='';
    }

}
