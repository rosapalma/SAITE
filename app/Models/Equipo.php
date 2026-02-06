<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [ 'marca','serial','serial_BN','estado' ];
    protected $primaryKey = 'id';

    public function responsable()
    {
        return $this->hasOne(Responsable::class);
    }

}
