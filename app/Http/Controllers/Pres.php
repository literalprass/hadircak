<?php

namespace App\Http\Controllers;

use App\Models\Abs;
use App\Models\Pegaw;

class Pres extends Controller
{
    protected $join;
    protected $abs;

    public function __construct()
    {
        $this->join = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                ->join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                ->select('pegaw.*', 'dept.*', 'shift.*','abspgw.*')
                ->get();
        $this->abs = Abs::get();
    }

    public function index()
    {
        $mas = session('usid');

        if (!session('usid')) {
            abort(404);
        };

        echo $this->join, $this->abs;
        
        // return view('prsn', compact('data'));
    }
}
