<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abs extends Model
{
    public $timestamps = false;
    protected $table = 'abspgw';
    protected $fillable = [
        'id',
        'tgl',
        'abs_awal',
        'abs_akhir',
        'abs_log',
        'DESC2'
    ];

    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);
    }
}
