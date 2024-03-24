<?php

namespace App\Http\Controllers;

use App\Models\Abs;
use App\Models\Pegaw;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
                            ->select('pegaw.*', 'dept.*', 'shift.*','abspgw.*');
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

        $id = session('usid')->id;
        $plg = Abs::where('id', $id)->get();
        

        // echo $mas;
        
        return view('prsn',compact('plg'));
    }
    
    public function prs()
    {
        app()->setLocale('id');

        $mas = session('usid');
        $id = $mas->id;

        $tglwk = Carbon::now();
        
        $crd = Abs::where('id', $id)->where('tgl', DB::raw('CURDATE()'));
            $itng = $crd->count();
            $ac = $crd->find($id);
        
        $tgl = $tglwk->setTimezone('Asia/Jakarta')->format('Y-m-d');
        $wk = $tglwk->setTimezone('Asia/Jakarta')->format('h:i:s');

            $absen = [
            'id' => $mas->id,
            'tgl' => $tgl,
            'abs_awal' => $wk,
            'abs_akhir' => '00:00:00',
            'abs_log' => 'A'
            ];;

        if ($itng == 0) {

            // Abs::create($absen);
            
            session()->flash('absaw', 'Absen masuk berhasil disimpan!');

            dd(session()->all());
            return redirect()->route('pres');
        
        //masih ada bug, kebaca record sebelumnya -- bug fixed
        } elseif ($itng == 1 && $ac->abs_log == 'A') {
            
            $ac->abs_akhir = $wk;
            $ac->abs_log = 'S';

            $ac->save();

            return redirect()->route('pres');
        } else {

            echo 'Anda sudah absen untuk hari ini';
            dd();

        };
        
       
    }
}
