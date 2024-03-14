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

    public function masuk(Request $req, $id)
    {
        $mas = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->find($id);
        
        $gaskan = $req->input('uy') == $mas->get('id') and $req->input('ps') == $mas->get('pass');

        if (!$mas){
            abort(404);
        }

        if ($gaskan){
          $mas->stlog = 1;
        }

        if ($this->$mas->stlog == 1) {
            return view('debugview', compact('mas'));
        } else {
            return view('logfun/litLog', compact('mas'));
            session()->flash('nguawur', 'Silahkan login terlebih dahulu!');
        }
        
    }


}
