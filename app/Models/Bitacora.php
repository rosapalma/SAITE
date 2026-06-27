<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';
    protected $fillable = [ 'soli_servicios_id','responsable_id','solucion','diagnostico','recomendacion','prioridad','fecha' ];

    protected $primaryKey = 'id';

    public function solicitud()
    {
        return $this->belongsTo(SoliServicio::class);
    }


    public function tecnico()
    {
        return $this->belongsTo(Responsable::class);

    }

}
