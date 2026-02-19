<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';
    protected $fillable = ['cedula','full_name','email','cargo','ubicacion_id'];
    protected $primaryKey = 'id';

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    public function usuario() 
    {
        return $this->hasOne(User::class);
    }

    public function ubicacion() 
    {
        return $this->belongsTo(Ubicacion::class);
    }

}
