<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Http\Request;


class edusKon extends Controller
{
    public function index()
    {
        return view('edus');
    }

    public function see($id)
    {
        $taek = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                     ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                     ->select('pegaw.*', 'dept.*', 'shift.*')
                     ->get();

        return view('edus', compact('taek'));
    }

}

