<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = [ 'name','abrev', ];

    public function empleados() 
    {
        return $this->hasMany(Responsable::class);
    }
}
