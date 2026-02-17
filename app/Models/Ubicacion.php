<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacions';
    protected $fillable = ['name','abrev' ];
    protected $primaryKey = 'id';

    public function equipo()
    {
        return $this->hasMany(Equipo::class);
    }
     public function responsable()
    {
        return $this->hasOne(Eesponsable::class);
    }
}
