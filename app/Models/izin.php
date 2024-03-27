<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izin';
    public $timestamps = false;
    protected $fillable = [
        'tipe',
        'tgl',
        'alasan'
    ];
    public function pegaw()
    {
        return $this->belongsTo(Pegaw::class);

    }
}