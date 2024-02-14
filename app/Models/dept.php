<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $table = 'dept';

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}
