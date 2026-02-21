<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [ 'tipo_id','marca_modelo','ubicacion_id','serial','serial_BN','responsable_id','estado','fecha_asig','fecha_adq' ];

    protected $primaryKey = 'id';

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);

    }
    
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

  

}

