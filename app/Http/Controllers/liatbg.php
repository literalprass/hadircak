<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Liatbg extends Controller
{
    public function index()
    {
        if (!session('usid')) {
            abort(404);
        }
        
        $batas = 4;
        $mas = session('usid');
        $crit = $mas->stlog == 1;
        $siu = $mas->TKT_ID <= 3;
        
        $cok = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                     ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                     ->select('pegaw.*', 'dept.*', 'shift.*')
                     ->limit($batas)
                     ->get();

        if ($crit) {
            return view('debugview', compact('cok','mas','siu'));
        } else {
            return view('logfun/litLog');
        }

    }

    public function pergi()
    {
        $mas = session('usid');
        $mas->stlog = 0;
        $mas->save();   

        Session::flush();
        return redirect()->route('formlog');
    }
}
