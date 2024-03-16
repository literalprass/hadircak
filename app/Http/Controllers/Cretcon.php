<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cretcon extends Controller
{
    public function index()
    {
        $mas = session('usid');
        $siu = $mas->TKT_ID <= 3;

        if (!session('usid')) {
            abort(404);
        } else if (!$siu) {
            abort(404);
        }
        
        return view('upus');
    }
}

