<?php

namespace App\Http\Controllers;

use App\Models\Abs;
use App\Models\Pegaw;
use Carbon\Carbon;

class Pres extends Controller
{
    protected $abspgw;
    protected $abs;
    protected $display;


    public function __construct()
    {
        $this->abspgw = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                            ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                            ->join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                            ->select('pegaw.*', 'dept.*', 'shift.*','abspgw.*')
                            ->get();
        $this->abs = Abs::get();
        $this->display = Pegaw::join('dept', 'pegaw.DEPT_ID', '=', 'dept.DEPT_ID')
                            ->join('shift', 'pegaw.SHIFT_ID', '=', 'shift.SHIFT_ID')
                            ->select('pegaw.*', 'dept.*', 'shift.*')
                            ->get();
    }

    public function index()
    {
        if (!session('usid')) {
            abort(404);
        };

        // echo $mas;
        
        return view('prsn');
    }
    
    public function prs()
    {
        app()->setLocale('id');
        $tglwk = Carbon::now();

        $plg = $this->abs->abs_log;

        dd($plg);

        $mas = session('usid');
        $tgl = $tglwk->setTimezone('Asia/Jakarta')->format('Y-m-d');
        $wk = $tglwk->setTimezone('Asia/Jakarta')->format('h:i:s');

        // dd($tgl,$wk);

        $absen = [
        'id' => $mas->id,
        'tgl' => $tgl,
        'abs_awal' => $wk,
        'abs_log' => 'A'
        ];

        Abs::create($absen);

        // if ($plg) {
        //     $this->abspgw->abs_akhir = $wk;
        //     $this->abspgw->save();
        // } else {
        //     echo $mas;
        // };

        return redirect()->route('pres');
    }
}
