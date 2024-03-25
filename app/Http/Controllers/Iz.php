<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use App\Models\Abs;
use App\Models\Izin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Iz extends Controller
{
    protected $dp;
    protected $jx;

    public function __construct()
    {
        $this->dp = Pegaw::join('izin', 'pegaw.ID', '=', 'izin.ID')
                     ->join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                     ->select('pegaw.*', 'izin.*', 'abspgw.*');
    }

    public function index()
    {
        if (!session('usid')) {
            abort(404);
        }
        
        echo $this->dp->get();
        dd($this->dp->get());
        
        return view('izin');
    }
}
