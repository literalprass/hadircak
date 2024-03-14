<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Http\Request;

class Liatbg extends Controller
{
    public function index()
    {
        if (!session('usid')) {
            abort(404);
        }

        $mas = session('usid');
        $crit = $mas->stlog == 1;
        
        $cok = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                     ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                     ->select('pegaw.*', 'dept.*', 'shift.*')
                     ->get();

        if ($crit) {
            return view('debugview', compact('cok','mas'));
        } else {
            return view('logfun/litLog');
        }

    }

    public function pergi()
    {
        $mas = session('usid');
        $mas->stlog = 0;
        $mas->save();

        session()->forget('usid');
        return redirect()->route('formlog');
    }
}
