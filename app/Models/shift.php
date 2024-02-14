<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shift';

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}
