<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izin';

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}