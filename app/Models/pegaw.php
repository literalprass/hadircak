<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegaw extends Model
{
    public $timestamps = false;
    protected $table = 'pegaw';

    public function dept()
    {
        return $this->hasMany(Dept::class);
    }

    public function shift()
    {
        return $this->hasMany(Shift::class);
    }

    public function tkt() 
    {
        return $this->hasMany(Tkt::class);
    }
}
