<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;

use App\Models\Pegaw;
use Illuminate\Http\Request;

class konCol extends Controller
{
    public function index()
    {
        $mas = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->get();

        if (!$mas){
            abort(404);
        }

        return view('logfun/litLog', compact('mas'));
    }

    public function masuk(Request $req)
    {
        $id = $req->input('uy');

        $mas = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->find($id);

        // dd($mas);
        
        $gaskan = $req->input('uy') == $mas->id AND $req->input('ps') == $mas->pass;

        if ($gaskan){
            $mas->stlog = 1;
            $mas->save();
        }

        $crit = $mas->stlog == 1;
        $cok = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->get();

        if ($crit) {
            return view('debugview', compact('cok'));
        } else {
            return view('logfun/litLog', compact('mas'));
            session()->flash('nguawur', 'Silahkan login terlebih dahulu!');
        }
        
    }


}
