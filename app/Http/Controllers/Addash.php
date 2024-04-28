<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class Addash extends Controller
{
    public function index() {
        
        if (!session('usid')) {
            abort(404);
        }

        $mas = session('usid');
        $n = $mas->nama;

        $izall = Izin::get();

        echo $izall;
        dd($mas, $n);



        return view('admin/dashy');
    }
}
