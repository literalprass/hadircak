<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class hsiz extends Controller
{
    protected $tabel_izin;

    function __construct() {   
        $this->tabel_izin = Izin::get();
    }

    function index() {

        if (!session('usid')) {
            abort(404);
        }
        
        $mas = session('usid');
        echo $this->tabel_izin;
        


        // return view('riwayat.iznhs');
    }
}
