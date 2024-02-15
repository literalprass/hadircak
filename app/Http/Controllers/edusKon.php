<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use Illuminate\Http\Request;


class edusKon extends Controller
{

    public function see($id)
    {
        $taek = Pegaw::find($id);

        return view('edus', compact('taek'));
    }

}

