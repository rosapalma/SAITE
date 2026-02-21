<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    public function equipo()
    {
        return $this->hasOne(Equipo::class);
    }
}
