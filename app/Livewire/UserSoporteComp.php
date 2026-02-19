<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Ubicacion;

class UserSoporteComp extends Component
{
     use WithPagination;

    public $usuarios, $ubicacions;

    function mount(){
        $this->usuarios = User::orderBy('id', 'desc')->get();
        $this->ubicacions = Ubicacion::all();
    }
    public function render()
    {
        return view('livewire.user-soporte-comp');
    }
}
