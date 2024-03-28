<?php

namespace App\Http\Controllers;

    use App\Models\Pegaw;
    use App\Models\Abs;
    use App\Models\Izin;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

        use Illuminate\Support\Facades\DB;
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
        if (!session('usid')) {
            abort(404);
        }
        
        return view('izin');
    }

    function upiz(Request $rq) 
    {
        $pgw = session('usid');
        $id = $pgw->id;

        //date format
        $dtstr = $rq->input('dt');
        $dtr = Carbon::parse($dtstr)->format('Y-m-d');

        //desc and type
        $desc = $rq->input('tp');
        switch ($desc) {
            case 'C' :
                $desc2 = 'Izin Sakit';
                break;
            case 'T' :
                $desc2 = 'Masuk Telat';
                break;
            case 'L' :
                $desc2 = 'Lain - Lain';
                break;
            default :
                echo "Invalid data request";
                dd();
        }

        $ijen = [
            'tipe' => $rq->input('tp'),
            'tgl'=> $dtr,
            'alasan' => $rq->input('als'),
            'id' => $pgw->id,
            'DESC2' => $desc2
        ];

        // dd($itng,$dtr,$apalah);

        Izin::create($ijen);
        return redirect()->route('pres');

    }
}
