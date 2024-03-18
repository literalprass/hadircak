<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abs extends Model
{
    protected $table = 'abspgw';

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}
