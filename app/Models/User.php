<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;
  
    protected $fillable = [
        'personal_id',
        'cedula',
        'email',
        'password',
        'privilege',

    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];



    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}
