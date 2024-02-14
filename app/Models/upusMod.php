<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class upusMod extends Model
{
    public $timestamps = false;
    
    protected $table = 'pegaw';

    protected $fillable = [
        'nama',
        'DEPT_ID',
        'SHIFT_ID',
        'TKT_ID'
    ];
}
