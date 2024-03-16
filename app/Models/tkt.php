<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tkt extends Model
{
    protected $table = 'tingkat';

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}
