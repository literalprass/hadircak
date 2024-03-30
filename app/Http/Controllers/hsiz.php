<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use Illuminate\Http\Request;

class hsiz extends Controller
{
    protected $tabel_izin;

    function __construct() {   
        $this->tabel_izin = Izin::get();
    }

    function index() {

        if (!session('usid')) {
            abort(404);
        }
        $mas = session('usid');
        $id = $mas->id;

        $dt_izn = $this->tabel_izin->where('id',$id);

        return view('riwayat.iznhs', compact('dt_izn'));
    }

    function apprIz($id_izin) {

        $aprIzn = Izin::where('ID_IZIN',$id_izin)->get('approval');

        // $aprIzn->approvl = 'Y';
        // $aprIzn->save();

        echo $aprIzn;
        dd($aprIzn);

    }

}
