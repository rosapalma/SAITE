<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [ 'tipo','marca_modelo','ubicacion','serial','serial_BN','responsable_id','estado','fecha_adq' ];
    protected $primaryKey = 'id';

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

}

