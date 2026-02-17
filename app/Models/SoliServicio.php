<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoliServicio extends Model
{
    protected $table ='soli-servicios';
    protected $fillable =['responsable_id','equipo_id','descripcion','statud'];
    protected $primaryKey = 'id';

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
