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
        $plg = Abs::where('id', $id)->orderBy('tgl','desc')->get();
        

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

            Abs::create($absen);
            return redirect()->route('pres')->with('absaw', 'Absen masuk berhasil disimpan!');
        
        //masih ada bug, kebaca record sebelumnya -- bug fixed
        } elseif ($itng == 1 && $ac->abs_log == 'A') {

            Abs::where('id',$id)
                ->where('tgl', DB::raw('CURDATE()'))
                ->update([
                    'abs_akhir' => $wk,
                    'abs_log' => 'S'
                ]);

            session()->flash('absak', 'Absen pulang berhasil disimpan!');
            return redirect()->route('pres');

        } else {

            return redirect()->route('pres');

        };
        
       
    }
}
