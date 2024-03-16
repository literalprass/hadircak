<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\upusMod; // Make sure to import your model

class upusKon extends Controller

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
        
        return view('post');
    }

    public function insertData(Request $request)
    {
        $data = [
            'nama' => $request->input('v1'),
            'DEPT_ID' => $request->input('v2'),
            'SHIFT_ID' => $request->input('v3'),
            'TKT_ID' => $request->input('v4')
        ];

        upusMod::create($data);

        session()->flash('suksex', 'Data berhasil ditambahkan!');

        return redirect()->route('dash');
    }
}
