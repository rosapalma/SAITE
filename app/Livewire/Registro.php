<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Equipo;

class Registro extends Component
{
    public $modelo, $marca, $bienes, $equipos;
    function mount(){ 
        $equipos = Equipo::all();
        $this->equipos = $equipos;
    }
    public function render()
    {
        return view('livewire.registro');
    }
    public function save()
    {
        $this->validate(['marca' => 'required']);
        $this->validate(['modelo'=>'required']);
        $AddNewEquipo = Equipo::create([
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'bienes' => $this->bienes,
                ]);
        $AddNewEquipo->save(); 
        $this->clear();
        $this->mount();
        return back()->with('mensaje','Equipo Registrado'); 
    }

    public function clear()
    {
        $this->marca='';
        $this->modelo ='';
        $this->bienes= '';
    }
}
