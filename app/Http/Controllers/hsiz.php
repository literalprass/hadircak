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

        $coltipe = Izin::where('id_izin',$id_izin)->value('tipe');
        $coldesc = Izin::where('id_izin',$id_izin)->value('DESC2');
        // dd($coltipe, $coldesc);

        Izin::join('abspgw', 'izin.tgl', '=', 'abspgw.tgl')
                ->where('ID_IZIN',$id_izin)
                ->update([
                    'approval' => 'Y',
                    'abspgw.abs_log' => $coltipe,
                    'abspgw.DESC2' => $coldesc
                ]);

        return redirect()->route('riwayatizin');
    }

}
