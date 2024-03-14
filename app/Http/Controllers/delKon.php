<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Http\Request;

class delKon extends Controller
{

    public function delus($id)
    {
        if (!session('usid')) {
            abort(404);
        }
        
        $uhuy = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
        ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
        ->select('pegaw.*', 'dept.*', 'shift.*')
        ->find($id);

        if ($uhuy) {
            $uhuy->delete();
        }

        session()->flash('suksex', 'Data telah berhasil dihapus!');

        return redirect()->route('dash');

    }

}

