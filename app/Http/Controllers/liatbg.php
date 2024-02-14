<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;

class Liatbg extends Controller
{
    public function index()
    {
        $taek = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                     ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                     ->select('pegaw.*', 'dept.*', 'shift.*')
                     ->get();

        return view('debugview', compact('taek'));
    }
}
