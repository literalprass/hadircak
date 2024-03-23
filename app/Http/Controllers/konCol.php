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

        if (!$mas){
            return redirect()->back();
            session()->flash('anjim', 'User tidak valid/tidak terdaftar!');
        }
        
        $gaskan = $req->input('uy') == $mas->id && $req->input('ps') == $mas->pass;

        if ($gaskan) {
            $mas->stlog = 1;
            $mas->save();
        } else {
            return redirect()->back();
            session()->flash('ahak', 'Password tidak sesuai!');
        }

        $crit = $mas->stlog == 1;

        if ($crit) {
            session(['usid'=> $mas]);
            return redirect()->route('dash');
        } else {
            return view('logfun/litLog');
        }
        
    }


}
