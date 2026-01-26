<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';
    protected $fillable = [ 'personal_id','equipo_id','fecha_asig' ];
    protected $primaryKey = 'equipo_id';

 
    public function equipo() 
    {
        return $this->hasMany(Equipo::class);
    }
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }


}
