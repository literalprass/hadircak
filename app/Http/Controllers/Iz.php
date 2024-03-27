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
        $this->dp = Pegaw::join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                    ->join('izin', 'pegaw.ID', '=', 'izin.ID')
                    ->select('pegaw.*', 'izin.*', 'abspgw.*');
    }

    public function index()
    {
        $pgw = session('usid');
        $id = $pgw->id;

        if (!session('usid')) {
            abort(404);
        }
        
        return view('izin');
    }
}
