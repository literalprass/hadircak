<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\Abs;
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

        $dt_izn = Izin::where('id',$id)->orderBy('tgl','desc')->get();

        return view('riwayat.iznhs', compact('dt_izn'));
    }

    function apprIz($id_izin) {

        $coltipe = Izin::where('id_izin',$id_izin)->value('tipe');
        $coldesc = Izin::where('id_izin',$id_izin)->value('DESC2');
        // $colapr = Izin::where('id_izin',$id_izin)->value('approval');
        // dd($coltipe, $coldesc,$colapr);

        $acuy = [
            'approval' => 'Y',
            'abspgw.abs_log' => $coltipe,
            'abspgw.DESC2' => $coldesc
        ];
        // dd($acuy);

        Izin::join('abspgw', 'izin.tgl', '=', 'abspgw.tgl')
                ->where('ID_IZIN',$id_izin)
                // ->update($acuy);
                ->update([
                    'approval' => 'Y',
                    'abspgw.abs_log' => $coltipe,
                    'abspgw.DESC2' => $coldesc
                ]);


        return redirect()->route('riwayatizin');
    }

}
