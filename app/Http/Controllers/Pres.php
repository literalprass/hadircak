<?php

namespace App\Http\Controllers;
use App\Models\Pegaw;

class Pres extends Controller
{
    protected $join;

    public function __construct()
    {
        $this->join = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                ->join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                ->select('pegaw.*', 'dept.*', 'shift.*','abspgw.*')
                ->get();
    }

    public function index()
    {
        $mas = session('usid');
        $siu = $mas->TKT_ID <= 3;

        if (!session('usid')) {
            abort(404);
        } else if (!$siu) {
            abort(404);
        }

        $data = $this->join;

        dd($data, $mas);
        
        return view('prsn', compact('data'));
    }
}
