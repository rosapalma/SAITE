<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    protected $fillable = [ 'cedula','full_name','departamento_id', ];
    protected $primaryKey = 'id';

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }

    public function usuario() 
    {
        return $this->hasOne(User::class);
    }

        

}
