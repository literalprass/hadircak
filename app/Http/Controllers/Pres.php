<?php

namespace App\Http\Controllers;

class Pres extends Controller
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
        
        return view('prsn');
    }
}
