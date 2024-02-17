<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Http\Request;


class edusKon extends Controller
{

    public function see($id)
    {
        $taek = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->find($id);

        if (!$taek){
            abort(404);
        }

        return view('edus', compact('taek'));
    }
    
    public function edus(Request $request, $id)
    {
        $shit = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->find($id);

        if (!$shit) {
            return abort(404);
        }

        $shit->nama = $request->input('v1');
        $shit->DEPT_ID = $request->input('v2');
        $shit->SHIFT_ID = $request->input('v3');

        $shit->save();

        return redirect()->route('/');

    }

}

