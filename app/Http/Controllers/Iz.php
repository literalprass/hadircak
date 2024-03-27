<?php

namespace App\Http\Controllers;

use App\Models\Pegaw;
use App\Models\Abs;
use App\Models\Izin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Iz extends Controller
{
    protected $dp;
    protected $jx;

    public function __construct()
    {
        $this->dp = Pegaw::join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                    ->join('izin', 'pegaw.ID', '=', 'izin.ID')
                    ->select('pegaw.*', 'izin.*', 'abspgw.*');
    }

    public function index()
    {
        $pgw = session('usid');
        // $id = $pgw->id;

        if (!session('usid')) {
            abort(404);
        }
        
        return view('izin');
    }

    function upiz(Request $rq) 
    {
        $dtstr = $rq->input('dt');
        $dtr = Carbon::parse($dtstr);
        $fromdt = $dtr->format('Y-m-d');

        $ijen = [
            'tipe' => $rq->input('tp'),
            'tgl'=> $fromdt,
            'alasan' => $rq->input('als')
        ];
        
        echo "hello";
        dd($ijen);
    }
}
