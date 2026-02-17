<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';
    protected $fillable = ['cedula','full_name','email','departamento_id','fecha_asig' ];
    protected $primaryKey = 'id';

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }

    public function equipo()
    {
        return $this->hasMany(Equipo::class);
    }

    public function usuario() 
    {
        return $this->hasOne(User::class);
    }


}
