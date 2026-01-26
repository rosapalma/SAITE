<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [ 'marca','modelo','serial','serial_bienes','tipo' ];
    protected $primaryKey = 'id';

    public function responsable() 
    {
        return $this->hasOne(Responsable::class);
    }


}
