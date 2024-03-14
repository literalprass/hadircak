<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cretcon extends Controller
{
    public function index()
    {
        if (!session('usid')) {
            abort(404);
        }
        
        return view('upus');
    }
}

